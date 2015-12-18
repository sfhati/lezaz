<!DOCTYPE html>
<html lang="lezaz:language()">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />


        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <lezaz:if condition='lezaz:get(useajax)'>

        <!--[if !IE]> -->
        <link rel="stylesheet" href="{template}admin/css/extra/pace.css" />

        <script data-pace-options='{ "ajax": true, "document": true, "eventLag": false, "elements": false }' src="{template}admin/js/pace.js"></script>

        <!-- <![endif]-->
    </lezaz:if>



    <lezaz:if condition="lezaz:language()=='ar'">
        <link rel="stylesheet" href="{template}admin/css/extra/ace-rtl.css" />
    </lezaz:if>
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

<body class="lezaz:get(skin) [style-rtl]">
<lezaz:import dir='{template}admin/css' type='css' compress='0'/>
<lezaz:import dir='{template}admin/js' type='js' compress='0'/>

