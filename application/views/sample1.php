
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
				<div class="blank-page widget-shadow scroll p5" id="style-2 div1">
					<div class="">
						<div class="dib">
							<h2 class="title1">Blank Page</h2>
						</div>
						<div class="pull-right">
							<a href="#" class="btn btn-success text-right" data-toggle="modal" data-target="#addcategory">Add Category</a>
						</div>
					</div>
					<hr/>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
						It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.
					</p>
				</div>
			</div>
			<!-- / .main-page -->
		</div>
		<!-- / #page-wrapper -->
	</div>

	<?php $this->load->view('admin/includes/foot'); ?>
	<script src="<?php echo base_url('assets/js/sweetalert.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/toastr.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/datatables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/validator.min.js'); ?>"></script>
	<script>
		<?php 
			if(isset($_SESSION['data'])) {
		?>
			toastr.<?php echo $_SESSION['class'] ?>('<?php echo $_SESSION['data']; ?>');
		<?php } ?>
	</script>
</body>
</html>
