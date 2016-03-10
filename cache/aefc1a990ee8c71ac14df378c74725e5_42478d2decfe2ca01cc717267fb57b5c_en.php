<?php global $lezaz;?>this is index.inc template , its default template !<br>
you can found this template in http://lezaz.cms/template/sample/ its theme template , you can change it from conf.php file. <br>

in plugin/test_plugin/index.php we add router <a href='/test/1/'>/@str/@num/</a> when you change str or number this str= <?php echo $lezaz->set( "str" ); ?> and number= <?php echo $lezaz->set( "num" ); ?><br>


b
you can add router to include other index.inc template , just use <code> $lezaz->main_template='doc.inc';  </code> <br>
see our <a href='/documentation/'>documentation</a><br>

<br>

   <?php 
$lezaz_bassam="no";
 if ($lezaz->get( "m" )) { 

$lezaz_bassam="yes";
 ?>      
 
    
    you send <code> GET </code> var , m= <b><?php echo $lezaz->get( "m" ); ?></b> <?php echo $lezaz_bassam; ?>   
<?php }else{ ?>
    try add /?m=your_name in URL <?php echo $lezaz_bassam; ?>
    
<?php }  ?>



