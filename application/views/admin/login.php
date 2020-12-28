<!DOCTYPE html>
<html>
	<head>
		<title><?php echo isset($title)? $title:NULL; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="login" />
		<?php 
			echo link_tag('assets/css/bootstrap.css');
			echo link_tag('assets/css/style.css');
			echo link_tag('assets/css/font-awesome.css');
			echo link_tag('assets/css/toastr.min.css');
			echo link_tag('assets/css/custom.css');
		?>
		<style>
			#page-wrapper {
				background-color:transparent;
			}
		</style>
	</head>
	<body>
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="<?php echo base_url('admin/login/process_login'); ?>" method="post">
							<input type="email" class="user" id="email" name="email" placeholder="Enter Your Email" required>
							<?php echo form_error('email'); ?>
							<input type="password" name="password" id="password" class="lock" placeholder="Password" required >
							<?php echo form_error('password'); ?>
							<div class="forgot-grid">
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" id="submit" name="Sign In" value="Login">
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/toastr.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
		
		<script>
			$(document).on('click','#submit',function(e){
				var email = $('#email').val();
				var pass = $('#password').val();
				if(email=="") {
					toast.error('Please enter email');
					return false;
				}
				if(pass=="") {
					toast.error('Please enter password');
					return false;
				}
			});
		</script>
	</body>
</html>
