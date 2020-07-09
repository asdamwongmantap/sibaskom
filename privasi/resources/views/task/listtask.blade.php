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
			<!-- Small modal -->
				<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm">
				<div class="modal-content">

					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2">Confirm Approval</h4>
					</div>
					<div class="modal-body">
					<form id="form-addpoint" data-parsley-validate class="form-horizontal form-label-left" method="post" >
							{{csrf_field()}}
							
							<div class="form-group">
								<div class="col-md-12 col-sm-12 col-xs-12">
								<select id="confirmddl" name="confirmddl" class="form-control col-md-7 col-xs-12">
								<option value="1">Approve</option>
								<option value="2">Reject</option>
								</select>
								</div>
								<input type="hidden" class="form-control col-md-7 col-xs-12" id="point" name="point" aria-describedby="point">
								<input type="hidden" class="form-control col-md-7 col-xs-12" id="taskcat_id" name="taskcat_id" aria-describedby="taskcat_id">
								<input type="hidden" class="form-control col-md-7 col-xs-12" id="task_id" name="task_id" aria-describedby="task_id">
								<input type="hidden" class="form-control col-md-7 col-xs-12" id="created_by" name="created_by" aria-describedby="created_by" value="{{auth()->user()->id}}">
								
								<input type="hidden" class="form-control col-md-7 col-xs-12" id="updated_by" name="updated_by" aria-describedby="updated_by" value="{{auth()->user()->id}}">
								
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-primary" id="savebtn">Confirm</button>
					
							</div>
					</form>
					</div>
					
				</div>
				</div>
			</div>
			<!-- end small modal -->
			<div class="col-md-12 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <h2>All My Task</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" style="height:100%">
				  <input type="hidden" id="userid" value="">
				  	
					  <a href="/sibaskom/addtask" class="btn btn-success" title="Tambah Task" data-target=".bs-example-modal-smadd" style="float:right;display:block;" 
                  id="tomboltambah"><i class="fa fa-plus"></i> Tambah Task</a></br>
					

                  
                  </br>
                  <table id="mydata" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
						  <th>No</th>
						  <th>Tanggal</th>
						  <th>My Task</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="show_data">
                    
                      	 
                      @foreach($data_task as $task)
                      <tr style="background-color:#F7F7F7;color:#000000;">
                          <td>{{$task->task_id}}</td>							
						  <td>{{$task->task_tgl}}</td>
						  <td>{{$task->taskcat_name}}</td>							
						  
                          @if (auth()->user()->level == '1')
							<td><a class="btn btn-success btnmodalitem" data-toggle="modal" data-target=".bs-example-modal-sm" data-taskid = "{{$task->task_id}}" data-taskcatid = "{{$task->task_cat}}">Confirm</a></td>
							@else
							<td><a href="/sibaskom/detailpengiriman/{{$task->task_id}}" class="btn btn-primary">Detail</a></td>
							@endif

                        </tr>
                      @endforeach
                      </tbody>
                    </table>
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
		$(document).ready(function(){
		$('#mydata').dataTable();
		});
		$(document).on('click','.btnmodalitem',function(e) {
			var taskid = $(this).data('taskid');
			document.getElementById("task_id").value = taskid; 

			var taskcatid = $(this).data('taskcatid');
			document.getElementById("taskcat_id").value = taskcatid; 

			if (document.getElementById("taskcat_id").value == "1" || document.getElementById("taskcat_id").value == "2"){
				var point = '50';
			}else if (document.getElementById("taskcat_id").value == "3"){
				var point = '50';
			}else if (document.getElementById("taskcat_id").value == "4"){
				var point = '100';
			}else if (document.getElementById("taskcat_id").value == "5"){
				var point = '200';
			}

			document.getElementById("point").value = point; 

		});
			//prosesdelete
			$('#form-addpoint').on('submit',function(e) {
			var form = $('#form-addpoint')[0];
			var data = new FormData(form);
			swal({
			  title: "Simpan Data",
			  text: "Apakah anda ingin menambahkan data barang ?",
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
					url:"{{url('/savepoint')}}",
					data: data,
					processData: false,
					contentType: false,
					cache: false,
					success:function(e){
						if (e !== "error") {
						swal({
						  title: "Success",
						  confirmButtonColor: "#002855",
						  text: "Approval Success",
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