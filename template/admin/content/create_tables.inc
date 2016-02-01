<title>[create_tables]</title>
<div class="page-header">
	<h1>
		[create_tables]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[create_tables]
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
 
<lezxz:table id="potential">
    <lezaz:field name="id_job" type="int" length="1" option="not null" comment="job field"/>
    <lezaz:field name="potential" type="longtext" comment="sort job field"/>
    <lezaz:field name="l" type="int" length="1"/>
    <lezaz:field name="c" type="int" length="1"/>
    <lezaz:field name="risk" type="int" length="3"/>
     <lezaz:field name="responsibillity" type="longtext" comment="sort job field"/>
    <lezaz:field name="l_responsibillity" type="int" length="1"/>
    <lezaz:field name="c_responsibillity" type="int" length="1"/>
    <lezaz:field name="risk_responsibillity" type="int" length="3"/>       
    <lezaz:field name="related" type="int" length="6" default="0" comment="related with hazar_level3 table"/>
    <lezaz:field name="sort" type="varchar" length="50" option="not null" comment="sort job field"/>
</lezxz:table>
                
<lezxz:table id="measures">
    <lezaz:field name="id_potential" type="int" length="11" option="not null" comment="job field"/>
    <lezaz:field name="measures" type="longtext" comment="sort job field"/>
    <lezaz:field name="sort" type="varchar" length="50" option="not null" comment="sort job field"/>
    <lezaz:field name="related" type="int" length="6" default="0" comment="related with hazar_level3 table"/>
</lezxz:table>
                
                
<lezxz:table id="jobs">
    <lezaz:field name="job" type="varchar" length="250" option="not null" comment="job field"/>
    <lezaz:field name="sort" type="varchar" length="50" option="not null" comment="sort job field"/>
    <lezaz:field name="related" type="int" length="6" default="0" comment="related with hazar_level3 table"/>
</lezxz:table>
                
<lezxz:table id="alert">
    <lezaz:field name="description" type="varchar" length="250" option="not null" comment="notefication comment"/>
    <lezaz:field name="type" type="int" length="6" default="0" comment="1 alert , 2 date , 3 other thing"/>
    <lezaz:field name="status" type="int" length="6" default="0" comment="1 mean done and see"/>
    <lezaz:field name="user" type="int" length="6" default="0" comment="member id"/>
</lezxz:table>

<lezaz:table id="check_list_oditer">
    <lezaz:field name="id_user" type="int" length="6" default="0" comment="member id"/>
    <lezaz:field name="id_plan" type="int" length="6" default="0"/>
    <lezaz:field name="id_obj" type="int" length="6" default="0"/>
    <lezaz:field name="id_list" type="int" length="6" default="0"/>
    <lezaz:field name="status" type="int" length="1" default="0" comment="1-0"/>
    <lezaz:field name="action" type="longtext" comment="corrective action"/>      
</lezaz:table>
                
lezaz:msg() 
			
		<!-- PAGE CONTENT ENDS -->  
	</div>
</div>




<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->