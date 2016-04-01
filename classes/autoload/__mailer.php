<?php

/**
 * Description of __mailer
 *
 * @author bassam
 */
class __mailer {

    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
    }

    public function sendmail($from_email, $from_name, $to_email, $to_name, $replyto_email, $replyto_name,$ccto_email,$ccto_name,$bccto_email,$bccto_name, $subject, $html,$image, $attachment, $pass_msg, $fail_msg) {
        global $lezaz;
        try {
            $this->mail->SetFrom($from_email, $from_name);
//email send to , this may array emails
            if (is_array($to_email)) {
                foreach ($to_email as $kmail => $vmail) {
                    if ($to_name[$kmail])
                        $this->mail->AddAddress($to_email[$kmail], $to_name[$kmail]);
                    else
                        $this->mail->AddAddress($to_email[$kmail]);
                }
            }else{
                $this->mail->AddAddress($to_email, $to_name);
            }
// email reply to 
            if (is_array($replyto_email)) {
                foreach ($replyto_email as $kmail => $vmail) {
                    if ($replyto_name[$kmail])
                        $this->mail->AddReplyTo($replyto_email[$kmail], $replyto_name[$kmail]);
                    elseif($replyto_email[$kmail])
                        $this->mail->AddReplyTo($replyto_email[$kmail]);
                }
            }elseif($replyto_email){
                $this->mail->AddReplyTo($replyto_email, $replyto_name);
            }
// email CC to 
            if (is_array($addCCto_email)) {
                foreach ($ccto_email as $kmail => $vmail) {
                    if ($ccto_name[$kmail])
                        $this->mail->addCC($ccto_email[$kmail], $ccto_name[$kmail]);
                    elseif($ccto_email[$kmail])
                        $this->mail->addCC($ccto_email[$kmail]);
                }
            }elseif($ccto_email){
                $this->mail->addCC($ccto_email, $ccto_name);
            }
// email BCC to 
            if (is_array($bccto_email)) {
                foreach ($bccto_email as $kmail => $vmail) {
                    if ($bccto_name[$kmail])
                        $this->mail->addBCC($bccto_email[$kmail], $bccto_name[$kmail]);
                    elseif($bccto_email[$kmail])
                        $this->mail->addBCC($bccto_email[$kmail]);
                }
            }elseif($bccto_email){
                $this->mail->addBCC($bccto_email, $bccto_name);
            }
// attachments 
            if (is_array($attachment)) {
                foreach ($attachment as  $vattach) {                    
                        $this->mail->AddAttachment($vattach);                   
                }
            }elseif($attachment){
                $this->mail->AddAttachment($attachment);
            }
            
            $this->mail->Subject = $subject;
            $this->mail->MsgHTML($html);

            $this->mail->AddEmbeddedImage('phpmailer.png', 'phpmailer_png');
            if (is_array($image)) {
                foreach ($image as $kimg=> $vimg) {                    
                        $this->mail->AddEmbeddedImage($vimg,$kimg);                   
                }
            }
            $this->mail->Send();
            if(!$pass_msg) $pass_msg="Your email was sent successfully";
            if(!$fail_msg) $fail_msg="Your email was Not send!";
            $lezaz->set_msg($pass_msg,'success');
        } catch (phpmailerException $e) {
            $lezaz->set_msg($fail_msg.'<br>'.$e->errorMessage(),'danger');
        } catch (Exception $e) {
            $lezaz->set_msg($fail_msg.'<br>'.$e->errorMessage(),'danger');
        }
    }

}
