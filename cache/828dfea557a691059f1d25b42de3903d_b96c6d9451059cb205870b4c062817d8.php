<?php global $lezaz;?>
   <?php 
echo $lezaz->lezaz->include_tpl('{template}admin/header') ;
     
 ?>



   <?php 
echo $lezaz->lezaz->include_tpl('{template}admin/navbar') ;
     
 ?>
	
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <!-- PAGE CONTENT ENDS -->
    
   <?php 
echo $lezaz->lezaz->include_tpl('{template}admin/sidebar') ;
       
 ?>
	


    
   <?php 
echo $lezaz->lezaz->include_tpl('{template}admin/pages') ;
       
 ?>


    <!-- PAGE CONTENT ENDS -->
    
   <?php 
echo $lezaz->lezaz->include_tpl('{template}admin/footer') ;
       
 ?>
	                        

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

</body>
</html>