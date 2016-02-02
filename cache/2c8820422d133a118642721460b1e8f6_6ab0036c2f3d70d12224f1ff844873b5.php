<?php global $lezaz;?> 



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
                     <?php 

$lezaz_check_list_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 10000 ";
 

   $check_list_sql = $lezaz->db->query("Select * From planning $limit");
  $lezaz_check_list_sql_num =  $lezaz->db->num_row("Select * From planning");
 
$lezaz_check_list_sql_counter=0 + $page_number;
        if (is_array($check_list_sql))
        foreach ($check_list_sql as $lezaz_check_list_sql) {
            if (is_array($lezaz_check_list_sql)){
            $lezaz_check_list_sql_x = ($lezaz_check_list_sql_x == '') ? '' : '';
            
?>
  
                            {
                                title: '<?php echo $lezaz_check_list_sql[note]; ?>',
                                start: '<?php echo conv_date( "$lezaz_check_list_sql[date]" ); ?>',
                                allDay: true,
                                className: 'label-success',
                                id:'<?php echo $lezaz_check_list_sql[id]; ?>'
                            },
                     
<?php
$lezaz_check_list_sql_counter++;
        }}
?>        
    

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


