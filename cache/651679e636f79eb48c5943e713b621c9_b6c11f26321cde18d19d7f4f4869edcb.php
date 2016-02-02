<?php global $lezaz;?><!DOCTYPE html>
<html lang="<?php echo $lezaz->language( "" ); ?>"> <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />


        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    
   <?php  if ($lezaz->set( "useajax" )) { 

$lezaz_="1";
 ?>      
 

        <!--[if !IE]> -->
        <link rel="stylesheet" href="{template}admin/css/extra/pace.css" />

        <script data-pace-options='{ "ajax": true, "document": true, "eventLag": false, "elements": false }' src="{template}admin/js/pace.js"></script>

        <!-- <![endif]-->
        
<?php }  ?>




    
   <?php  if ($lezaz->language( "" )=='ar') { 

$lezaz_="1";
 ?>      
 
        <link rel="stylesheet" href="{template}admin/css/extra/ace-rtl.css" />
        
<?php }  ?>

    <style>
        .iconleftx {
            width: 35px;
            float: inherit;
            height: 34px;
            padding: 10px 0px 0px 0px;
            display: none;
        }
        @media (min-width: 768px){ 
            .iconleftx {
                display: block;
            }

        }
        .ace-nav > li { 
            border-[left_right]: 1px solid #E1E1E1 !important;
            padding: 0;
            position: relative;
            float: [left_right] !important;
        }
    </style>

</head>

<body class="<?php echo $lezaz->set( "skin" ); ?> [style-rtl]">
<?php                     
                    echo compressCSS("{template}admin/css",0,0);
                        ?>
<?php                     
                    echo compressJS("{template}admin/js",0,0);
                        ?>

