<!-- side nav js -->
	<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/modernizr.custom.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/metisMenu.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/SidebarNav.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/classie.js') ?>"></script>
   	<script src="<?php echo base_url('assets/js/jquery.nicescroll.js') ?>"></script>
   	<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
   	<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->

	<!-- Classie --><!-- for toggle left push menu script -->
		
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->

	<!--scrolling js-->