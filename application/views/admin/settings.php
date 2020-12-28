
<?php 	
	$this->load->view('admin/includes/head');
	echo link_tag('assets/css/sweetalert.css');
	echo link_tag('assets/css/toastr.min.css');
?>
	<style>
		.title {
			margin-bottom:10px;
		}
		
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
							<h2 class="title1">Settings</h2>
						</div>
					</div>
					<hr/>
					<form role="form" method="post" action="<?php echo base_url('admin/settings/process_settings'); ?>">
						<h3 class="text-center title">Site Info</h3>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Site Name</label>
							<div class="col-md-9">
								<input type="text" name="site_name" id="site_name" class="form-control" value="<?php echo $item['site_name'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Site Email</label>
							<div class="col-md-9">
								<input type="email" name="site_email" id="site_email" class="form-control" value="<?php echo $item['site_email'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Site Phone</label>
							<div class="col-md-9">
								<input type="text" name="site_phone" id="site_phone" class="form-control" value="<?php echo $item['site_phone'] ?>" />
							</div>
						</div>
						<h3 class="text-center title">SMTP Info</h3>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">SMTP Server</label>
							<div class="col-md-9">
								<input type="text" name="smtp_server" id="smtp_server" class="form-control" value="<?php echo $item['smtp_server'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">SMTP Port</label>
							<div class="col-md-9">
								<input type="text" name="smtp_port" id="smtp_port" class="form-control" value="<?php echo $item['smtp_port'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">SMTP Username</label>
							<div class="col-md-9">
								<input type="text" name="smtp_user" id="smtp_user" class="form-control" value="<?php echo $item['smtp_user'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">SMTP Password</label>
							<div class="col-md-9">
								<input type="text" name="smtp_password" id="smtp_password" class="form-control" value="<?php echo $item['smtp_password'] ?>" />
							</div>
						</div>
						<h3 class="text-center title">Payment Gateway</h3>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Marchent Id</label>
							<div class="col-md-9">
								<input type="text" name="marchent_id" id="marchent_id" class="form-control" value="<?php echo $item['marchent_id'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Marchent Key</label>
							<div class="col-md-9">
								<input type="text" name="marchent_key" id="marchent_key" class="form-control" value="<?php echo $item['marchent_key'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">Credit Card No#</label>
							<div class="col-md-9">
								<input type="text" name="credit_card" id="credit_card" class="form-control" value="<?php echo $item['credit_card'] ?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-md-2 text-right">CVV Number</label>
							<div class="col-md-9">
								<input type="text" name="cvv" id="cvv" class="form-control" value="<?php echo $item['cvv'] ?>" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label col-md-4 text-right">Card Expire Month</label>
									<div class="col-md-8">
										<select name="expire_month" id="expire_month" class="form-control">
											<?php 
												$arr = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
												for($a=1;$a<=12;$a++) {
													$sel = $a==$item['expire_month']?"selected":"";
											?>
												<option <?php echo $sel ?> value="<?php echo $a ?>"><?php echo $a."  ".$arr[($a-1)]; ?></option>
											<?php } ?>
										</select>
										
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="control-label col-md-4 text-right">Card Expired Year</label>
									<div class="col-md-6">
										<select name="expire_year" id="expire_year" class="form-control">
											<?php 
												for($s=date('Y');$s<date('Y',strtotime('+10 years'));$s++){
													$sel = $s==$item['expire_year']?"selected":"";
													echo "<option ".$sel." value='".$s."'>".$s."</option>";
												}
											?>
										</select>
									</div>
								</div>
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
