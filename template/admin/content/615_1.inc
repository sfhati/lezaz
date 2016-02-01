 



<title>[Calendar]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [Calendar]

    </h1>
</div><!-- /.page-header -->
<div class="row"> 
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div id="calendar"></div>
        <script src="{theme}js/extra/fullcalendar.js"></script>

        <script>
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

    var calendar = $('#calendar').fullCalendar(
                    {
                        //isRTL: true,
                        buttonHtml: {
                            prev: '<i class="ace-icon fa fa-chevron-left"></i>',
                            next: '<i class="ace-icon fa fa-chevron-right"></i>'
                        },
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        events: [
                     <lezaz:sql id='check_list_sql' sql="Select * From planning" limit="10000">  
                            {
                                title: 'lezaz#check_list_sql[note]',
                                start: 'lezaz~conv_date($lezaz_check_list_sql[date])',
                                allDay: true,
                                className: 'label-success',
                                id:'lezaz#check_list_sql[id]'
                            },
                     </lezaz:sql>
                        ],
                    eventClick: function(calEvent, jsEvent, view) {
                        window.location='/615_2/?plan='+calEvent.id;
			
               
                    }
                    }
            );
        </script>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


