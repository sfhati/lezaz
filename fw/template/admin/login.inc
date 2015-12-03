
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/template/Ace1.3.3/assets/js/html5shiv.js"></script>
		<script src="/template/Ace1.3.3/assets/js/respond.js"></script>
		<![endif]-->
	</head>
        <lezaz:if condetion="lezaz~get(key)==1">
            bassam essawi lezaz~get(key) | lezaz~get(my)
            <lezaz:else/>
            mohamad essawi lezaz~get(key)
            
        ****    lezaz~#bassam(id)  ****
        #####    lezaz~any(bassam[id])  ####
        lezaz~set(bassam,essa)
        <lezaz:func id="get_a" function="get_cache" parm1="a" parm2="b" print="0"/>
        lezaz~#get_a(0)
        lezaz~func(get_cache,bassam)
        @@@    lezaz~any(bassam)  @@@
        </lezaz:if>
        
        lezaz:get_cache('address')
        lezaz$get_cache
        lezaz#get_cache('address')
        
        <lezaz:each array="bassam" id="bassam" data="normal,session,object">
            lezaz~bassam(counter): lezaz~bassam(key)=lezaz~bassam(value) <br>
        </lezaz:each>
        lezaz~bassam(count)
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
                                                                    <i class="fa" style="
    background: url(/template/admin/images/sfhati-30.png);
    width: 30px;
    height: 30px;
"></i>
									<span class="light-blue">Sfhati</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
		 