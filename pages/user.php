<?php
	if (isset($_SESSION['user']) AND $_SESSION['user']!='admin') {
?>
<!DOCTYPE HTML>
<html>
<?php
	include "./layout/head.php";
?>
	<body>
	   <div class="page-container">
	   <!--/content-inner-->
		<div class="left-content">
		   <div class="mother-grid-inner">
				 <!--header start here-->
				<?php
					include "./layout/header.php";
				?>
			<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Halaman Awal	</a> <i class="fa fa-angle-right"></i></li>
			</ol>
			<?php
				if(isset($_GET['p']))
				{
					include($_GET['p'].'.php');
				}
				else
				{
					include('inneruser.php');
				}
			?>	<!--inner block start here-->
	<div class="inner-block">
	</div>
	<!--inner block end here-->
	<!--copy rights start here-->
	<div class="copyrights">
		 <p>Silau:: E-Smart Laundry</p>
	</div>	
	<!--COPY rights end here-->
	</div>
	</div>
	  <!--//content-inner-->
				<!--/sidebar-menu-->
	<?php
		include "./layout/sidebar.php";
	?>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	   <script src="js/bootstrap.min.js"></script>
	   <!-- /Bootstrap Core JavaScript -->	   
	<!-- morris JavaScript -->	
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.js"></script>
	<script>
		$(document).ready(function() {
			//BOX BUTTON SHOW AND CLOSE
		   jQuery('.small-graph-box').hover(function() {
			  jQuery(this).find('.box-button').fadeIn('fast');
		   }, function() {
			  jQuery(this).find('.box-button').fadeOut('fast');
		   });
		   jQuery('.small-graph-box .box-close').click(function() {
			  jQuery(this).closest('.small-graph-box').fadeOut(200);
			  return false;
		   });
		});
		</script>
	</body>
</html>
<?php
  }
  else { 
    // header("Location: login.php");
    include 'login.php';
	}
?>