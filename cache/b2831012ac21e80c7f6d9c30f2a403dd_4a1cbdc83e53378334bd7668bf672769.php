<?php global $lezaz;?><html>
hi man your variable <b>my_var</b> value is: <?php echo $lezaz->get( "my_var" ); ?>!
<br><br><hr>

<?php echo $lezaz->msg( "" ); ?>

<hr>

<form id="settingpage" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >
    <input name="file1" type="file">       
    <input type="submit" value="upload"/>
    
</form>
</html>