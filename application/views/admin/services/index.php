
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
							<h2 class="title1">Services</h2>
						</div>
					</div>
					<hr/>
					<div class="table-responsive">
						<table class="table" id="tbl">
							<thead>
								<tr>
									<th>Name</th>
									<th>Seller Name</th>
									<th>Category</th>
									<th>Price</th>
									<th>Region</th>
									<th>Added</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
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
	
	

	<?php $this->load->view('admin/includes/foot'); ?>
	<script src="<?php echo base_url('assets/js/sweetalert.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/toastr.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/datatables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/validator.min.js'); ?>"></script>
	<script>
		var url = "<?php echo base_url('admin/services/ajax'); ?>";
		$(document).ready(function(){
		  $('#tbl').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				"url": url,
				"dataType": "JSON",
				"type": "POST",
				"data":{ 'req':'get_all_services'} // all ads from system db
			  },
			"columns": [
			  { "data": "name" },
			  { "data": "sname" },
			  { "data": "category" },
			  { "data": "price" },
			  { "data": "region" },
			  { "data": "added" },
			  { "data": "status" },
			  { "data": "action" },
			],
			"pageLength": 50,
			'columnDefs': [ {
				'targets': [6,7],
				'orderable': false,
				"createdCell": function (td, cellData, rowData, row, col) {
					$(td).addClass('text-center');
				}
			}]
		  }); // datatables
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
		
		
	</script>
</body>
</html>
