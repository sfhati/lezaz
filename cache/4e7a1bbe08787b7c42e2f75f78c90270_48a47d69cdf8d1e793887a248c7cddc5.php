<?php global $lezaz; ?>
hi there :)
<br>

<?php
if ($lezaz->get("m")) {
    $lezaz_ = "1";
?>      

    you send <code> GET </code> var , m= <b><?php echo $lezaz->get("m"); ?></b>    
<?php } else { ?>
    try add /?m=you_name in URL
<?php } ?>



