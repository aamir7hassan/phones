
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
					<form role="form" method="post" action="<?php echo base_url('admin/dashboard/process_reset_password'); ?>">
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">New Password</label>
							<div class="col-md-9">
								<input type="password" name="pass" id="pass" class="form-control" value="" required />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Confirm New Password</label>
							<div class="col-md-9">
								<input type="password" name="cpass" id="cpass" class="form-control" value="" required />
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
