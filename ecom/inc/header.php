<!DOCTYPE html>
<html>
<head>
	<title><?php echo $mytitle; ?></title>
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/grid.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script type="text/javascript" src="./files/js/form_validate.js"></script>
</head>
<body>
	<header class="main-header">
		<div class="grid-container">		
			<h1 class="grid-2 main-logo" style="color: white">
				<img src="./assets/images/logo.png" style="background-color: black"></h1>
			<ul class="grid-8 main-nav">
			<style type="text/css"></style>

				<li <?php if($section == "home"){echo"class='on'";}?>><a href="./index.php">Home</a></li>

				<li <?php if($section == "about_us"){echo"class='on'";}?>><a href="./about_us.php">About Us</a></li>

				<li <?php if($section == "contact_us"){echo"class='on'";}?>><a href="./contact_us.php" >Contact Us</a></li>
				
			</ul>
		</div>
	</header>