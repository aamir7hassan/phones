
<?php 	
	$this->load->view('admin/includes/head');
	echo link_tag('assets/css/sweetalert.css');
	echo link_tag('assets/css/toastr.min.css');
	echo link_tag('assets/css/bootstrap-datepicker.css');
	echo link_tag('assets/css/datatables.min.css');
?>


</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<?php $this->load->view('admin/includes/navbar');?>
	</div>
		<!--left-fixed -navigation-->

		<?php $this->load->view('admin/includes/topnav'); ?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				
				
				<div class="widget-shadow scroll p5" id="style-2 div1">
					<div class="">
						<div class="dib">
							<h2 class="title1">Categories</h2>
						</div>
						<div class="pull-right">
							<a href="#" class="btn btn-success text-right" data-toggle="modal" data-target="#addcategory">Add Category</a>
						</div>
					</div>
					<hr/>
					<div class="table-responsive">
						<table class="table" id="tbl">
							<thead>
								<tr>
									<th>Name</th>
									<th>Date Created</th>
									<th>Is Active</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach($items as $key=>$val) {
										$cat = $val['is_active'];
									if($cat=="1") {
										$status = "<span class='text-success'>Yes</span>";
										$title = "Disable";
									} elseif($cat=="0") {
										$status = "<span class='text-danger'>No</span>";
										$title = "Enable";
									} else {
										$status="";$title="";
									}
								?>
									<tr>
										<td><?php echo $val['name']; ?></td>
										<td><?php echo date('M d,Y',strtotime($val['date_created'])); ?></td>
										<td><?php echo $status; ?></td>
										<td class="text-center">
											<a href="#" data-edit="<?php echo $val['id']; ?>" class="text-info edit"><span class="fa fa-edit iconss" title="Edit"></a>
											<a href="#" data-del="<?php echo $val['id'];?>" class="text-danger del"><span class="fa fa-trash iconss" title="Delete"></a>
											<a href="#" data-tgl="<?php echo $val['id'];?>" data-val="<?php echo $val['is_active'] ?>" class="text-success tgl"><span class="fa fa-first-order iconss" title="<?php echo $title;?>"></a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- / .main-page -->
		</div>
		<!-- / #page-wrapper -->
	</div>
	<!-- Modal -->
	<div id="addcategory" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add Category</h4>
		  </div>
		  <div class="modal-body">
			<form role="form" method="post">
				<div class="form-group">
					<label for="" class="control-label">Category Name</label>
					<input type="text" name="name" id="name" class="form-control" autocomplete="off" />
				</div>
			</form>
		  </div>
		  <div class="modal-footer">
			<a href="#" id="addc" class="btn btn-success">Add</a>
			<a type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
		  </div>
		</div>

	  </div>
	</div>
	
	<div id="editcategory" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Edit Category</h4>
		  </div>
		  <div class="modal-body">
			<form role="form" method="post">
				<input type="hidden" id="id" value="" />
				<div class="form-group">
					<label for="" class="control-label">Category Name</label>
					<input type="text" name="ename" id="ename" class="form-control" autocomplete="off" />
				</div>
			</form>
		  </div>
		  <div class="modal-footer">
			<a href="#" id="updatec" class="btn btn-success">Update</a>
			<a type="button" class="btn btn-danger" data-dismiss="modal">Close</a>
		  </div>
		</div>

	  </div>
	</div>

	<?php $this->load->view('admin/includes/foot'); ?>
	<script src="<?php echo base_url('assets/js/sweetalert.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/toastr.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/datatables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/validator.min.js'); ?>"></script>
	<script>
		var url = "<?php echo base_url('admin/ajax/index'); ?>";
		$(document).on('click','#addc',function() {
			var name = $('#name').val();
			if(name=="") {
				toastr.error('Please select category name');
				return false;
			}
			$.ajax({
				url:url,
				type:"POST",
				dataType:"JSON",
				data:{'req':'add-category','name':name},
				beforeSend: function(){
					$('#addc').html('Saving...');
				},
				complete: function(){
					$('#addc').html('Add');
				},
				success:function(res) {
					if(res=="1") {
						toastr.success('Category added successfully');
						window.location.reload();
					} else {
						toastr.error(res);
					}
				}
			});
		});
		
		$(document).on('click','.del',function(e) {
			var id = $(this).data('del');
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this record",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: true }, function(){
				$.ajax({
					url:url,
					type:"POST",
					dataType:"JSON",
					data:{'req':'delete_category','id':id},
					success:function(res) {
						if(res=="1"){
							toastr.success('Category deleted successfully');
							window.location.reload();
						} else {
							toastr.error(res);
						}
					}
				});
			});
		});
		
		$(document).on('click','.edit',function(e){
			var id = $(this).data('edit');
			$.ajax({
				url:url,
				type:"POST",
				dataType:"JSON",
				data:{'req':'fetch_category','id':id},
				success:function(res) {
					$('#ename').val(res.name);
					$('#id').val(res.id);
					$('#editcategory').modal('show');
				}
			});
			
		});
		
		$(document).on('click','#updatec',function(e){
			var id = $('#id').val();
			var name = $('#ename').val();
			if(name=="") {
				toastr.error('Please enter category name');
				return false;
			}
			$.ajax({
				url:url,
				type:"POST",
				dataType:"JSON",
				data:{'req':'update_category','name':name,'id':id},
				beforeSend: function(){
					$('#updatec').html('Updating...');
				},
				complete: function(){
					$('#updatec').html('Update');
				},
				success:function(res) {
					if(res=="1") {
						toastr.success('Category updated successfully');
						window.location.reload();
					} else {
						toastr.error(res);
					}
				}
			});
		});
		
		$(document).on('click','.tgl',function(e) {
			var id = $(this).data('tgl');
			var val = $(this).data('val');
			$.ajax({
				url:url,
				type:"POST",
				dataType:"JSON",
				data:{'req':'toggle_category','id':id,'val':val},
				success:function(res) {
					if(res=="1") {
						toastr.success('Category updated successfully');
						window.location.reload();
					} else {
						toastr.error(res);
					}
				}
			});
		});
		$('#tbl').DataTable();
	</script>
</body>
</html>
