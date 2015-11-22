
			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">sfhati</span>
							Application &copy; [php:"echo date('Y')"end php]
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
                                                    <a href="https://twitter.com/sfhati_com" target="x1">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="https://www.facebook.com/sfhati?ref=hl" target="x2">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="http://sfhati.com" target="x3">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

<script>
            function msgsuccess(data){
                    $.gritter.add({
                    text: data,
                            class_name: 'gritter-success'
                    }); 
                  //  aftersubmit();
            }
            function msgerror(data){
                    $.gritter.add({
                    text: data,
                            class_name: 'gritter-error'
                    });                
            }
            function aftersubmit() {                   
                    $('#testform')[0].reset();
                    $('#id-input-file-1 , #id-input-file-2 , #id-input-file-012').ace_file_input('reset_input');
                    $(".chzn-select").val('').trigger("liszt:updated");
                    $('#switchdiscount1,#switchprice1').hide();
            }

var building;
 var building_name;
 var floor;
 var office;
 var office_no;
</script>

<iframe name="ajaxform" id="ajaxform" style="display: none"/>