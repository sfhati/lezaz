<?php global $lezaz; ?>      <?php echo time( "" ); ?> <br>  ------------lezaz----------------------<hr><br>  <?php echo date( "d/m/Y","555666999" ); ?> // for function call and echo result  its mean  func(parm1,parm2) <br>  <?php echo $lezaz_id; ?> // echo value for lezaz syntax use id  its mean $lezaz_id<br>  <?php echo $lezaz_id[parm]; ?> // echo value for lezaz syntax use id parameter  its mean  $lezaz_id_parm<br>  <?php echo $parm; ?> // echo $parm from php files  its mean $parm <br>  <?php echo $parm1[item]; ?> // echo array item from $parm using in php files  its mean $parm[item] <br>  <?php echo $lezaz->lezaz->get( "parm" ); ?> // echo result from lezaz class its mean $lezaz->func(parm)<br>  <br>          <?php  $lezaz_ififx="no";  if ($lezaz_id[parm]) {   $lezaz_ififx="yes";  ?>             <?php }  echo $lezaz_ififx;  ?> <br>      #ififx: <?php echo $lezaz_ififx; ?> <br>  <?php
for ($i = 3; $i<$lezaz->lezaz->get( "bass" ); $i++) {    
    $i=$i+1;
    $lezaz_idfor=$i;    
?>
  <?php echo $lezaz_idfor; ?> <br> 
<?php
}

?>
  
<br>        <?php echo $lezaz->lezaz->get( "bass" ); ?>bbbbb  cc