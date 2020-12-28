
<?php 	
	$this->load->view('admin/includes/head');
	echo link_tag('assets/css/sweetalert.css');
	echo link_tag('assets/css/toastr.min.css');
?>
	<style>
	</style>

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
							<h2 class="title1">Account Info</h2>
						</div>
					</div>
					<hr/>
					<form role="form" method="post" action="<?php echo base_url('admin/dashboard/process_account'); ?>">
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">First Name</label>
							<div class="col-md-9">
								<input type="text" name="fname" id="fname" class="form-control" value="<?php echo $item['fname'] ?>" required />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Last Name</label>
							<div class="col-md-9">
								<input type="text" name="lname" id="lname" class="form-control" value="<?php echo $item['lname'] ?>" required />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Email</label>
							<div class="col-md-9">
								<input type="email" name="email" id="email" class="form-control" value="<?php echo $item['email'] ?>" required />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Phone</label>
							<div class="col-md-9">
								<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $item['phone_no'] ?>" />
							</div>
						</div>
						
						<div class="form-group">
							<input type="submit" value="Update" class="btn btn-success" id="submit" />
						</div>
					</form>
				</div>
			</div>
			<!-- / .main-page -->
		</div>
		<!-- / #page-wrapper -->
	</div>
	<?php $this->load->view('admin/includes/foot'); ?>
	<script src="<?php echo base_url('assets/js/toastr.min.js'); ?>"></script>
	<script>
		<?php 
			if(isset($_SESSION['data'])) {
		?>
			toastr.<?php echo $_SESSION['class'] ?>('<?php echo $_SESSION['data']; ?>');
		<?php } ?>
	</script>
</body>
</html>
