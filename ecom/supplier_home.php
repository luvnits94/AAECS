<?php 
	session_start();
	$section="sup_home";
	$mytitle="Supplier Home";
	include('inc/header.php'); 
?>
	<h3 align="center">Welcome <?php echo $_SESSION["user"];?></h3>
	<div class="grid-container">
		<div class="grid-8">
			<img src="./assets/images/supp_home.png" >
		</div>
		<div class="grid-4 sub-nav">
			<?php include('inc/supplier_sub-nav.php'); ?>
		</div>
		
	</div>

<?php include('inc/footer.php'); ?>