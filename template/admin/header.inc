<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <lezaz:if condition='lezaz:get(useajax)'>

		<!--[if !IE]> -->
		<link rel="stylesheet" href="/template/Ace1.3.3/assets/css/pace.css" />

		<script data-pace-options='{ "ajax": true, "document": true, "eventLag": false, "elements": false }' src="/template/Ace1.3.3/assets/js/pace.js"></script>

		<!-- <![endif]-->
        </lezaz:if>
		


<lezaz:if condition="lezaz:get(lng)=='ar'">
<link rel="stylesheet" href="/template/Ace1.3.3/assets/css/ace-rtl.css" />
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
</style>
<script src="/template/Ace1.3.3/assets/js/jquery.js"></script>




		<!-- ace styles -->
		<link rel="stylesheet" href="/template/Ace1.3.3/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/template/Ace1.3.3/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/template/Ace1.3.3/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="/template/Ace1.3.3/assets/js/ace-extra.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/template/Ace1.3.3/assets/js/html5shiv.js"></script>
		<script src="/template/Ace1.3.3/assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="lezaz:get(skin) [style-rtl]">
            
            