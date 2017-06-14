<?php 
	$section="home";
	$mytitle="Home";
	include('inc/header.php'); 
?>
	<div class="main-banner hide-mobile">
	<h3>Welcome To Automobile Accessories E-Commerce System</h3>
	</div>
	<div class="grid-container">
	
		<div class="grid-4">
                    <div class="sub-nav" >
                    <h4>Supplier</h4>
	                    <p><img src="./assets/images/supplier.png" style="width:310px;height:200px"></p>
	                    <p><a class="btn btn-primary" href="./supplier_login.php">Login</a></p>
                    </div>
		</div>

        <div class="grid-4">
            <div class="sub-nav">
                <h4>Customer</h4>
                <p><img  src="./assets/images/customer.png" style="width:310px;height:200px" ></p>
                <p><a class="btn btn-default" href="./customer_login.php">Login</a></p>

            </div>
        </div>

        <div class="grid-4">
            <div class="sub-nav">
                <h4>Manager</h4>
                <img src="./assets/images/manager.png" style="width:310px;height:200px">
                <p><a class="btn btn-success" href="./manager_login.php">Login</a></p>
            </div>
        </div>
    	 <div class="grid-8">
     		<a href="./register.php">Not Yet Reigistered?Click Here</a>
		</div>
	</div>


<?php include('inc/footer.php'); ?>