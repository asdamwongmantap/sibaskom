@include('template/headermeta')

<!-- @section('content') -->
        <!-- page content -->
        <body class="nav-md" progress_bar="true">
  
    <div class="container body">
      <div class="main_container">
      @include('template/menu')
@include('template/topmenu')
        <div class="right_col" role="main">
           <!--marquee-->
		   @include('template/headerinfo')
		  <!-- end marquee-->
		  <!--list userakses-->
			<div class="row">
			
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
				<h2>What's My Task ?</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
                <form id="form-addtask" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    {{csrf_field()}}
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="task_cat">Apa yang saya lakukan hari ini ? </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<select id="task_cat" name="task_cat" class="form-control col-md-7 col-xs-12">
						@foreach($data_taskcat as $taskcat)
							<option value="{{$taskcat -> taskcat_id}}">{{$taskcat -> taskcat_name}}</option>
						@endforeach
						</select>
						
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="labeltask_additional_info1" id="labeltask_additional_info1" style="display: block">No.Order 
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12" id="task_additional_info1" name="task_additional_info1" aria-describedby="task_additional_info1" style="display: block">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="task_additional_info2" style="display: block" id="labeltask_additional_info2">Nama Produk 
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12" id="task_additional_info2" name="task_additional_info2" aria-describedby="task_additional_info2" style="display: block">
						</div>
                    </div>
                    <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="task_additional_info3" style="display: block" id="labeltask_additional_info3">Nama Penerima 
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" class="form-control col-md-7 col-xs-12" id="task_additional_info3" name="task_additional_info3" aria-describedby="task_additional_info3" style="display: block">
						</div>
					</div>
						<input type="hidden" class="form-control col-md-7 col-xs-12" id="created_by" name="created_by" aria-describedby="created_by" value="{{auth()->user()->id}}">
						
						<input type="hidden" class="form-control col-md-7 col-xs-12" id="updated_by" name="updated_by" aria-describedby="updated_by" value="{{auth()->user()->id}}">
						
						
						<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<button type="submit" class="btn btn-primary" id="savebtn">Simpan</button>
			
					</div>
					</div>
                    
                    </form>
				</div>
              </div>
            </div>
			
			<!-- end widget -->
			  		  
            </div>
			<!--end list userakses-->
			
        </div>
        <!-- /page content -->
        @include('template/footermeta')
		 <script type="text/javascript">
			$('#task_cat').on('change',function(e) {
				if (document.getElementById("task_cat").value == "1"){
					document.getElementById("labeltask_additional_info1").style.display="block";
					document.getElementById("task_additional_info1").style.display="block";
					document.getElementById("labeltask_additional_info1").innerHTML="No.Order";

					document.getElementById("labeltask_additional_info2").style.display="block";
					document.getElementById("task_additional_info2").style.display="block";

					document.getElementById("labeltask_additional_info3").style.display="block";
					document.getElementById("task_additional_info3").style.display="block";
				}else if (document.getElementById("task_cat").value == "2"){
					document.getElementById("labeltask_additional_info1").style.display="block";
					document.getElementById("task_additional_info1").style.display="block";
					document.getElementById("labeltask_additional_info1").innerHTML="No.Order";

					document.getElementById("labeltask_additional_info2").style.display="block";
					document.getElementById("task_additional_info2").style.display="block";

					document.getElementById("labeltask_additional_info3").style.display="block";
					document.getElementById("task_additional_info3").style.display="block";
				}else if (document.getElementById("task_cat").value == "3"){
					document.getElementById("labeltask_additional_info1").style.display="block";
					document.getElementById("task_additional_info1").style.display="block";
					document.getElementById("labeltask_additional_info1").innerHTML="IG Siapa";

					document.getElementById("labeltask_additional_info2").style.display="none";
					document.getElementById("task_additional_info2").style.display="none";

					document.getElementById("labeltask_additional_info3").style.display="none";
					document.getElementById("task_additional_info3").style.display="none";
				}else if (document.getElementById("task_cat").value == "4"){
					document.getElementById("labeltask_additional_info1").style.display="block";
					document.getElementById("task_additional_info1").style.display="block";
					document.getElementById("labeltask_additional_info1").innerHTML="IG Siapa";

					document.getElementById("labeltask_additional_info2").style.display="none";
					document.getElementById("task_additional_info2").style.display="none";

					document.getElementById("labeltask_additional_info3").style.display="none";
					document.getElementById("task_additional_info3").style.display="none";
				}else if (document.getElementById("task_cat").value == "5"){
					document.getElementById("labeltask_additional_info1").style.display="block";
					document.getElementById("task_additional_info1").style.display="block";
					document.getElementById("labeltask_additional_info1").innerHTML="URL";

					document.getElementById("labeltask_additional_info2").style.display="none";
					document.getElementById("task_additional_info2").style.display="none";

					document.getElementById("labeltask_additional_info3").style.display="none";
					document.getElementById("task_additional_info3").style.display="none";
				}
				
				// else{
				// 	document.getElementById("labeltask_additional_info1").style.display="none";
				// 	document.getElementById("task_additional_info1").style.display="none";
				// }
			});
		$('#myDatepicker2').datetimepicker({
        		format: 'DD/MM/YYYY'
			});
        $('#form-addtask').on('submit',function(e) {
			var form = $('#form-addtask')[0];
			var data = new FormData(form);
			swal({
			  title: "Simpan Data",
			  text: "Apakah anda ingin menyimpan data ini ?",
			  confirmButtonText:"Yakin",
			  confirmButtonColor: "#002855",
			  cancelButtonText:"Tidak",
			  showCancelButton: true,
			  closeOnConfirm: false,
			  type: "warning",
			  showLoaderOnConfirm: true
			}, function () {
				$.ajax({
					type: "POST",
					enctype: 'multipart/form-data',
					url:"{{url('/savetask')}}",
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					success:function(e){
						if (e !== "error") {
						swal({
						  title: "Success",
						  confirmButtonColor: "#002855",
						  text: "Data berhasil disimpan !.",
						  type: "success"
						},function(){
							window.location='/sibaskom/mytask';
						  });
						}
						else{
						swal({
						  title: "Failed",
						  confirmButtonColor: "#002855",
						  text: e+"1",
						  type: "error"
						});
						}
						
					},
					error:function(xhr, ajaxOptions, thrownError){
						swal({
						  title: "Failed",
						  confirmButtonColor: "#002855",
						  text: e+"2",
						  type: "error"
						});
					}
					
				});
				return false;
			});
			e.preventDefault(); 
		  });
		  
    </script> 
    </body>
</html>
        