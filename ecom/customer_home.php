<?php
	$section="cus_home";
	$mytitle="Customer Home"; 
	include('inc/header.php');
	session_start();
 ?>

	<h3 align="center">Welcome <?php echo $_SESSION["user"];?></h3>
	<div class="grid-container">
		<div class="grid-8">
			<img src="./assets/images/cus_home.png">
		</div>
		<div class="grid-4 sub-nav">
			<?php include('inc/customer_sub-nav.php'); ?>
		</div>
	</div>
<?php include('inc/footer.php'); ?>