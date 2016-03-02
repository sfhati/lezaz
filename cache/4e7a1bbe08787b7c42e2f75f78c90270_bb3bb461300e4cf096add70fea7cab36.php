<?php global $lezaz;?>this is index.inc template , its default template !<br>
you can found this template in http://fw.cms/template/sample/ its theme template , you can change it from conf.php file. <br>

in plugin/test_plugin/index.php we add router <a href='/test/1/'>/@str/@num/</a> when you change str or number this str= <?php echo $lezaz->set( "str" ); ?> and number= <?php echo $lezaz->set( "num" ); ?><br>



you can add router to include other index.inc template , just use <code> $lezaz->main_template='doc.inc';  </code> <br>
see our <a href='/documentation/'>documentation</a><br>

<br>

   <?php  if ($lezaz->get( "m" )) { 

$lezaz_="1";
 ?>      
 
    you send <code> GET </code> var , m= <b><?php echo $lezaz->get( "m" ); ?></b>    
<?php }else{ ?>
    try add /?m=your_name in URL
    
<?php }  ?>



