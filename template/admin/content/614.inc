 
<title>[Control Panel] - [configuration]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        4.14

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

lezaz:msg()

<form method="post">
    <div class="dd" id="nestable">
        <ol class="dd-list">
             <lezaz:sql id='hazar_jobs_sql' sql="Select * From jobs ORDER BY sort ASC" limit="10000">   
           
            <li class="dd-item dd2-item dd-colored" id="job_lezaz#hazar_jobs_sql[id]" floorid="lezaz#hazar_jobs_sql[id]">
                <div class="dd-handle dd2-handle">lezaz#hazar_jobs_sql[sort]</div>
                <div class="dd2-content no-hover">lezaz#hazar_jobs_sql[job]</div>

                <ol class="dd-list">
                   <lezaz:sql id='potential_sql' sql="Select * From potential where id_job='lezaz#hazar_jobs_sql[id]'  ORDER BY sort ASC" limit="10000">
                    <li class="dd-item dd2-item dd-colored">
                        <div class="dd-handle dd2-handle">lezaz#potential_sql[sort]</div>
                        <div class="dd2-content no-hover" id="olezaz#potential_sql[id]">lezaz#potential_sql[potential]
                            <div class="[style-pullar] action-buttons">    
                                <div class='potential xddiv'>
                                    <input name='potential[lezaz#potential_sql[id]][]' value='lezaz#potential_sql[responsibillity]' placeholder="Control Responsibillity" class='inputmain xdinput'/>
                                </div>

                                <div class='fieldl xddiv'>
                                    <select name='fieldl[lezaz#potential_sql[id]][]' id="llezaz#potential_sql[id]" onchange="selectmain('llezaz#potential_sql[id]', 'clezaz#potential_sql[id]', 'olezaz#potential_sql[id]')" class='selectmain selectmainllezaz#potential_sql[id]'>
                                        <option>lezaz#potential_sql[l_responsibillity]</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class='fieldc xddiv'>
                                    <select name='fieldc[lezaz#potential_sql[id]][]' id='clezaz#potential_sql[id]' onchange="selectmain('llezaz#potential_sql[id]', 'clezaz#potential_sql[id]', 'olezaz#potential_sql[id]')" class='selectmain selectmainclezaz#potential_sql[id]'>
                                        <option>lezaz#potential_sql[c_responsibillity]</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                                                  
                                <a class="green plusbutton" fork="lezaz#potential_sql[id]" sort="lezaz#potential_sql[sort]" href="javascript:">
                                    <i class="ace-icon fa fa-plus bigger-130"></i>
                                </a>
                            </div>                      
                        </div>

                        <ol class="dd-list" id="contenerlezaz#potential_sql[id]">
                   <lezaz:sql id='measures_sql' sql="Select * From measures where id_potential='lezaz#potential_sql[id]'  ORDER BY sort ASC" limit="10000">

                            <li class="dd-item dd2-item dd-colored" id="xxlezaz#measures_sql[id]">
                                <div class="dd-handle dd2-handle sortarxc"><span>lezaz#measures_sql[sort]</span>
                                    <input class="stepshide" type="hidden" name="sort[lezaz#potential_sql[id]][]" value="lezaz#measures_sql[sort]"/>        
                                </div>
                                <div class="dd2-content no-hover" >
                                    <div class="[style-pullar] action-buttons">    
                                        <div class='potential xddiv' >
                                            <input style="width:750px" name='measures[lezaz#potential_sql[id]][]' value='lezaz#measures_sql[measures]' placeholder="Control Measures" class='inputmain xdinput'/>
                                        </div>                                                  
                                        <a class="red deletebutton" sort="lezaz#potential_sql[sort]" ele="lezaz#potential_sql[id]" fork="xxlezaz#measures_sql[id]" href="javascript:">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>
                                    </div>                    
                                </div>
                            </li>                            
                   </lezaz:sql>

                        </ol>                                        
                    </li>
                     </lezaz:sql>
                </ol>


            </li>
             </lezaz:sql>
        </ol>
    </div>











    <div class="form-actions center">
        <button id="add_item" type="button" class="btn btn-sm btn-info">
            Add JOB STEP
            <i class="ace-icon fa fa-plus icon-on-right bigger-110"></i>
        </button>
        <button type="submit" class="btn btn-sm btn-success">
            Submit
            <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
        </button>                 
    </div>  
    <input type="hidden" name="bassam1" value="essa1"/>
</form>
<div class='maindiv hidden' id="addmain">

    <li class="dd-item dd2-item dd-colored" id="000typexc000">
        <div class="dd-handle dd2-handle sortarxc"><span></span>
            <input class="stepshide" type="hidden" name="sort[000typemeasures000][]" value="1"/>        
        </div>
        <div class="dd2-content no-hover" >
            <div class="[style-pullar] action-buttons">    
                <div class='potential xddiv' >
                    <input style="width:750px" name='measures[000typemeasures000][]' value='' placeholder="Control Measures" class='inputmain xdinput'/>
                </div>                                                  
                <a class="red" id="000typexc000deletebutton" href="javascript:">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
            </div>                    
        </div>
    </li>

</div>

<script>


$('.deletebutton').on('click', function() {
    var x=$(this).attr('fork');
    var ele=$(this).attr('ele');
    var sort = $(this).attr('sort');
               $('#' + x).remove();
            sortstep(sort, ele); 
});


    $('.plusbutton').on('click', function() {
        var ele = $(this).attr('fork');
        var sort = $(this).attr('sort');
        var x = 'X' + Math.floor((Math.random() * 1000000000000000) + 1);//element id flooridhere
        $('#contener' + ele).append($('#addmain').html().replace(/000typexc000/g, x).replace(/000typemeasures000/g, ele)); //
        $('#' + x + 'deletebutton').click(function() {
            $('#' + x).remove();
            sortstep(sort, ele);
        });
        sortstep(sort, ele);
    });

    function sortstep(sortx, id) {
        var sort = 0;

        $('#contener' + id).find('.sortarxc').each(function() {
            sort++;
            $(this).find('span').text(sortx + '.' + sort);
            $(this).find('.stepshide').val(sortx + '.' + sort);

        });
    }

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



