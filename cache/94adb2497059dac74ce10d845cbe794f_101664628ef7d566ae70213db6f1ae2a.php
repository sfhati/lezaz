<?php global $lezaz;?> 
<title>[Control Panel] - [configuration]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        4.16

    </h1>
</div><!-- /.page-header -->

<style>
    .maindiv{clear: both;}
    .steps{float: left;    width: 30px;    height: 30px;}
    .jobs{float: left;    width: 40%;    height: 30px;}
    .potential{float: left;margin-top: -6px;}
    .sortarpa{    float: left;    width: 32px;    height: 30px;    text-align: center;}
    .fieldl ,.fieldc{
        float: left;
        width: 30px;
        height: 32px;
        overflow: hidden;
        margin-top: -6px;
    }    .risk{float: left;    width: 30px;text-align: center;background: #333;    color: #fff;    height: 30px;}
    .inputmain{width:300px;    height: 30px;float: left;}
    .selectmain{width: 58px;    height: 30px;    overflow: hidden;float: left;}
    .addbutton{    float: left;    height: 30px;    width: 85px;    overflow: hidden;}
    .buttonpic{    width: 26px;    padding: 0px;}
    .xdinput {
        background: #ffd;
        border: 1px solid #ced;
    }
 .xddiv {
    border: 1px solid #ddd;
    height: 30px;
    padding: 3px;
    text-align: center;
}
    .subhand {
        left: -13px !important;
        top: -10px !important;
        position: relative !important;
        float: left;
    }
    .dd {

        max-width: none;

    }
</style>

[if:"[var:"_MSG-var"end var]","
<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>

    <p>
        <strong>
            <i class="ace-icon fa fa-check"></i>
            [var:"_MSG"end var]
        </strong>

    </p>

</div>

"end if]

    <div class="dd" id="nestable">
        <ol class="dd-list">
            [sql:"jobs_sql","Select * From jobs ORDER BY sort ASC","1000","
            <li class="dd-item dd2-item dd-colored" id="job_%jobs_sql:id%" floorid="%jobs_sql:id%">
                <div class="dd-handle dd2-handle">%jobs_sql:sort%</div>
                <div class="dd2-content no-hover">%jobs_sql:job%

                </div>

                <ol class="dd-list">
                    [sql:"potential_sql","Select * From potential where id_job='%jobs_sql:id-var%'  ORDER BY sort ASC","1000","
                    <li class="dd-item dd2-item dd-colored">
                        <div class="dd-handle dd2-handle">%potential_sql:sort%</div>
                        <div class="dd2-content no-hover" id="o%potential_sql:id%">
                            <div class='potential xddiv'>%potential_sql:potential%</div>
                               <div class='fieldl xddiv'>%potential_sql:l%</div>
                                <div class='fieldc xddiv'>%potential_sql:c%</div>                                                                                               
                            
                            <div class="[style-pullar] action-buttons">    
                                <div class='potential xddiv'>
                                   %potential_sql:responsibillity%
                                </div>

                                <div class='fieldl xddiv'>%potential_sql:l_responsibillity%</div>
                                <div class='fieldc xddiv'>%potential_sql:c_responsibillity%</div>                                                                                               
                            </div>                      
                        </div>

                        <ol class="dd-list" id="contener%potential_sql:id%">

                            [sql:"measures_sql","Select * From measures where id_potential='%potential_sql:id-var%'  ORDER BY sort ASC","1000","
                            <li class="dd-item dd2-item dd-colored" id="xx%measures_sql:id%">
                                <div class="dd-handle dd2-handle sortarxc"><span>%measures_sql:sort%</span></div>
                                <div class="dd2-content no-hover" >%measures_sql:measures%
                                    <div class="[style-pullar] action-buttons">                                                                                           
                                        <a class="red deletebutton" sort="%potential_sql:sort%" ele="%potential_sql:id%" fork="xx%measures_sql:id%" href="/admin/page/sendmail/&potential=%potential_sql:id%&job=%jobs_sql:id%&measures=%measures_sql:id%">
                                            <i class="ace-icon fa fa-cogs bigger-130"></i>
                                        </a>
                                    </div>                    
                                </div>
                            </li>                            
                            "end sql]

                        </ol>                                        
                    </li>
                    "end sql]
                </ol>


            </li>
            "end sql]
        </ol>
    </div>



 
    
<script>



    function selectmain(no1, no2, o) {

        var arraycolor = {
            1: '#B6FFB6',
            2: '#B6FFB6',
            3: '#B6FFB6',
            4: '#B6FFB6',
            5: 'rgb(255, 251, 124)',
            8: 'rgb(255, 251, 124)',
            9: 'rgb(255, 251, 124)',
            6: 'rgb(255, 251, 124)',
            10: 'rgb(255, 192, 128)',
            15: 'rgb(255, 192, 128)',
            16: 'rgb(255, 192, 128)',
            12: 'rgb(255, 192, 128)',
            20: 'rgb(255, 216, 209)',
            25: 'rgb(255, 216, 209)'
        }
        no1 = $('#' + no1).val();
        no2 = $('#' + no2).val();
        var no3 = no1 * no2;
        $("#" + o).css('background', arraycolor[no3]);
    }
    
     $('.selectmain').each(function() {
        eval(  $(this).attr('onchange'));
     });
</script>


<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->

[include:"{template}admin/jsajax"end include]	

