<?php
/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the new BSD license.
 *
 * @package     Ace
 * @license     http://www.opensource.org/licenses/BSD-3-Clause New BSD license
 * @author		David Zeller <zellerda01@gmail.com>
 */
class Ace_Media_Image
{
    
	/**
	 * Working image
	 * @var resource
	 */
	protected $working_image;

	/**
	 * Image infos
	 * @var array
	 */
	protected $info;

	/**
	 * Stamp datas
	 * @var array
	 */
	protected $stamp_datas = null;

	/**
	 * Class constructor
	 *
	 * @param string $base_image The absolute path of the image
	 */
	public function __construct($image_file)
	{
            ini_set('memory_limit', '800M');
		if(extension_loaded('gd'))
		{
                    $base_info = getimagesize($image_file);
                if($base_info['mime']=='image/gif' || $base_info['mime']=='image/png' || $base_info['mime']=='image/jpeg'){}else{$image_file=UPLOADED_FOLDER.'/404.jpg';}

			$tmp = $this->loadImage($image_file);
			$this->working_image = $tmp[0];
			$this->info = $tmp[1];
		}
		else
		{
			throw new RuntimeException('The "gd" extension in not loader in your php configuration.');
		}
	}

	/**
	 * Load an image
	 *
	 * @param string $image_file
	 * @return array
	 * @throws RuntimeException
	 * @throws InvalidArgumentException
	 */
	protected function loadImage($image_file)
	{
		if(file_exists($image_file))
		{
			$base_info = getimagesize($image_file);

			$info['width'] = $base_info[0];
			$info['height'] = $base_info[1];
			$info['channels'] = isset($base_info['channels']) ? $base_info['channels'] : 1;
			$info['bits'] = $base_info['bits'] ? $base_info['bits'] : 8;
			$info['mime'] = $base_info['mime'];

			$required_memory = ($info['width'] * $info['height'] * ($info['bits'] / 8) * $info['channels'] * 2.5 ) / (1024 * 1024);
			$available_memory = substr(ini_get('memory_limit'), 0, -1);

			if($required_memory > $available_memory)
			{
				throw new RuntimeException(sprintf("%s cannot create the image because there is not enough memory allocated to PHP. (%dMB required / %dMB available)", get_class($this), $required_memory, $available_memory));
			}

			// Create the image ressource depending of the mime type
			switch($info['mime'])
			{
				case 'image/png' :
					$base_image = imagecreatefrompng($image_file);
					break;
				case 'image/jpeg':
					$base_image = imagecreatefromjpeg($image_file);
					break;
				case 'image/gif' :
					$base_image = imagecreatefromgif($image_file);
					break;
				default:
					$base_image = null;
					break;
			}

			if(is_null($base_image))
			{
				throw new InvalidArgumentException($image_file . ' is not an image');
			}

			return array($base_image, $info);
		}
		else
		{
			throw new RuntimeException($image_file . ' not found.');
		}
	}

	/**
	 * Add a stamp on the base image
	 *
	 * @param string $image_file Absolute stamp image path
	 * @param integer $x Position in pixels from the left
	 * @param integer $y Position in pixels from the top
	 * @return Ace_Media_Image
	 */
	public function stamp($image_file, $x = 0, $y = 0)
	{
		$tmp = $this->loadImage($image_file);
		$this->stamp_datas = array($tmp[0], $tmp[1], $x, $y);
		return $this;
	}

	/**
	 * Merge the stamp with the image
	 */
	protected function mergeStamp()
	{
		if(!is_null($this->stamp_datas))
		{
			imagecopy($this->working_image, $this->stamp_datas[0], $this->stamp_datas[2], $this->stamp_datas[3], 0, 0, $this->stamp_datas[1]['width'], $this->stamp_datas[1]['height']);
		}
	}

	/**
	 * Save the image
	 *
	 * @param string $filename The absolute path of the new image
	 * @param integer $quality
	 * @return Ace_Media_Image
	 */
	public function save($filename, $quality = 100)
	{
		$this->mergeStamp();

		switch($this->info['mime'])
		{
			case 'image/png' :
				$quality = (intval($quality) > 90) ? 9 : round(intval($quality)/10);
				imagepng($this->working_image, $filename, $quality);
				break;
			case 'image/jpeg':
				imagejpeg($this->working_image, $filename, $quality);
				break;
			case 'image/gif' :
				imagegif($this->working_image, $filename);
				break;
			default:
				break;
		}

		$this->clean();
		return $this;
	}

	/**
	 * Output the image
	 *
	 * @param integer $quality
	 * @return Ace_Media_Image
	 */
	public function output($quality = 100)
	{
		$this->save(null, $quality);
		return $this;
	}

	/**
	 * Resize an image
	 *
	 * @param integer $dest_w Destination width
	 * @param integer $dest_h Destination height
	 * @param mixed $ratio Define the ratio mode (false = no ratio, W = ratio width, H = ratio height, B = both)
	 * @return Ace_Media_Image
	 */
	public function resize($dest_w, $dest_h, $ratio = false)
	{
		if(strtoupper($ratio) == 'W')
		{
			$ratio_w = $dest_w / $this->info['width'];
			$dest_h = $this->info['height'] * $ratio_w;
		}
		else if(strtoupper($ratio) == 'H')
		{
			$ratio_h = $dest_h / $this->info['height'];
			$dest_w = $this->info['width'] * $ratio_h;
		}
		else if(strtoupper($ratio) == 'B')
		{
			if($this->info['height'] < $this->info['width'])
			{
				$this->resize($dest_w, $dest_h, 'W');
			}
			else
			{
				if($dest_w < $dest_h)
				{
					$this->resize($dest_w, $dest_h, 'W');
				}
				else
				{
					$this->resize($dest_w, $dest_h, 'H');
				}
			}

			return $this;
		}

		$new_image = $this->createImage($dest_w, $dest_h);
		imagecopyresampled($new_image, $this->working_image, 0, 0, 0, 0, $dest_w, $dest_h, $this->info['width'], $this->info['height']);

		$this->working_image = $new_image;

		$this->info['width'] = imagesx($new_image);
		$this->info['height'] = imagesy($new_image);

		return $this;
	}

	/**
	 * Rotate the image
	 *
	 * @param integer $angle
	 * @return Ace_Media_Image
	 */
	public function rotate($angle,$color="255,255,255")
	{
            $clr= explode(",", $color);
            $color = imagecolorallocate($this->working_image, $clr[0], $clr[1], $clr[2]);
		$this->working_image = imagerotate($this->working_image, $angle,$color, 0);
                
		return $this;
	}

	/**
	 * Flip the image
	 *
	 * @param string $direction Axe direction (H = horizontal, V = vertical, B = both)
	 * @return Ace_Media_Image
	 */
	public function flip($direction = 'V')
	{
		$new_image = $this->createImage($this->info['width'], $this->info['height']);

		if(strtoupper($direction) == 'V')
		{
			for($x = 0; $x < $this->info['width']; $x++)
			{
				imagecopy($new_image, $this->working_image, $this->info['width'] - $x - 1, 0, $x, 0, 1, $this->info['height']);
			}
		}
		else if(strtoupper($direction) == 'H')
		{
			for($y = 0; $y < $this->info['height']; $y++)
			{
				imagecopy($new_image, $this->working_image, 0, $this->info['height'] - $y - 1, 0, $y, $this->info['width'], 1);
			}
		}
		else
		{
			$this->flip('H')->flip('V');
			return $this;
		}

		$this->working_image = $new_image;
		return $this;
	}

	/**
	 * Crop the image
	 *
	 * @param integer $base_width This is the width of the reference (sample: The width of the crop container)
	 * @param integer $dest_w Destination width
	 * @param integer $dest_h Destination height
	 * @param integer $top Top position (x)
	 * @param integer $left Left position (y)
	 * @param integer $w Crop width
	 * @param integer $h Crop height
	 * @return Ace_Media_Image
	 */
	public function crop($base_width, $dest_w, $dest_h, $x = 0, $y = 0, $w = 0, $h = 0)
	{
		$w_ratio = $this->info['width'] / $base_width;
		$h_ratio = $this->info['height'] / ($this->info['height'] / $w_ratio);

		if($w == 0)
		{
			$w = $dest_w * $w_ratio;
		}
		else
		{
			$w = $w * $w_ratio;
		}

		if($h == 0)
		{
			$h = $dest_h * $h_ratio;
		}
		else
		{
			$h = $h * $h_ratio;
		}

		$y = $y * $w_ratio;
		$x = $x * $h_ratio;

		$new_image = $this->createImage($dest_w, $dest_h);
		imagecopyresampled($new_image, $this->working_image, 0, 0, $x, $y, $dest_w, $dest_h, $w, $h);

		$this->working_image = $new_image;
		$this->info['width'] = imagesx($new_image);
		$this->info['height'] = imagesy($new_image);

		return $this;
	}

	/**
	 * Cut the image
	 *
	 * @param integer $dest_w Destination image width
	 * @param integer $dest_h Destination image height
	 * @param string $h_align Horizontal position (L = left, C = center, R = right)
	 * @param string $v_align Vertical position (T = top, M = middle, B = bottom)
	 * @return Ace_Media_Image
	 */
	public function cut($dest_w, $dest_h, $h_align = 'C', $v_align = 'T')
	{
		$w_ratio = $dest_w / $this->info['width'];
		$h_ratio = $dest_h / $this->info['height'];
		$h_align = strtoupper($h_align);
		$v_align = strtoupper($v_align);

		if($this->info['width'] > $this->info['height'] || ($dest_h / $w_ratio) > $this->info['height'])
		{
			if($dest_w > $dest_h && ($this->info['height'] * $w_ratio) > $dest_h)
			{
				$this->crop(($this->info['width'] * $w_ratio), $dest_w, $dest_h, $this->getX($h_align, $w_ratio, $dest_w), $this->getY($v_align, $w_ratio, $dest_h));
			}
			else
			{
				$this->crop(($this->info['width'] * $h_ratio), $dest_w, $dest_h, $this->getX($h_align, $h_ratio, $dest_w), $this->getY($v_align, $h_ratio, $dest_h));
			}
		}
		else
		{
			$this->crop($this->info['width'] * $w_ratio, $dest_w, $dest_h, 0, $this->getY($v_align, $w_ratio, $dest_w));
		}

		return $this;
	}

	/**
	 * Create a new image
	 *
	 * @param integer $dest_w
	 * @param integer $dest_h
	 * @return resource
	 */
	protected function createImage($dest_w, $dest_h)
	{
		$image = imagecreatetruecolor($dest_w, $dest_h);

		// Add the transparent support
		if($this->info['mime'] == 'image/gif')
		{
			imagealphablending($image, true);

			$trnprt_indx = imagecolortransparent($this->working_image);

			if ($trnprt_indx >= 0)
			{
				$trnprt_color = imagecolorsforindex($this->working_image, $trnprt_indx);
				$trnprt_indx = imagecolorallocate($image, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
				imagefill($image, 0, 0, $trnprt_indx);
				imagecolortransparent($image, $trnprt_indx);
			}
		}
		elseif($this->info['mime'] == 'image/png')
		{
			imagealphablending($image, false);
			$colorTransparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
			imagefill($image, 0, 0, $colorTransparent);
			imagesavealpha($image, true);
		}

		return $image;
	}

	/**
	 * Get X position for crop
	 *
	 * @param string $align
	 * @param float $ratio
	 * @param integer $dest
	 * @return float
	 */
	protected function getX($align = 'C', $ratio, $dest)
	{
		if($align == 'L')
		{
			return 0;
		}
		else if($align == 'R')
		{
			return ($this->info['width'] * $ratio) - $dest;
		}
		else
		{
			return (($this->info['width'] * $ratio) / 2) - ($dest / 2);
		}
	}

	/**
	 * Get Y position for crop
	 *
	 * @param string $align
	 * @param float $ratio
	 * @param integer $dest
	 * @return float
	 */
	protected function getY($align = 'T', $ratio, $dest)
	{
		if($align == 'T')
		{
			return 0;
		}
		else if($align == 'B')
		{
			return ($this->info['height'] * $ratio) - $dest;
		}
		else
		{
			return (($this->info['height'] * $ratio) / 2) - ($dest / 2);
		}
	}

	/**
	 * Return the base image height
	 *
	 * @return integer
	 */
	public function getImageHeight()
	{
		return $this->info['height'];
	}

	/**
	 * Return the base image width
	 *
	 * @return integer
	 */
	public function getImageWidth()
	{
		return $this->info['width'];
	}

	/**
	 * Return the mime type of the image
	 *
	 * @return string
	 */
	public function getMimeType()
	{
		return $this->info['mime'];
	}

	/**
	 * Clean memory
	 */
	protected function clean()
	{
		imagedestroy($this->working_image);
	}

	/**
	 * Create an intense of the image class from a base image
	 *
	 * @param string $base_image The absolute path of the image
	 * @return Ace_Media_Image
	 */
	public static function with($base_image)
	{
		return new self($base_image);
	}
}