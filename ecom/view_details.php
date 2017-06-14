<?php
	$section="view_details";
	$mytitle="Customer Home"; 
	$q = $_REQUEST["item_id"];


	include('inc/header.php');
 ?>

	<div class="grid-container fix">
		<div>
		</div>
		<div class="grid-6 main-nav">
			<?php include('inc/customer_sub-nav.php'); ?>
			<br>
		</div>
	</div>

	<h1 align="center">Product Details</h1>
	<div class="grid-container">
	<?php
	
		include('files/_db/db.conn');
			if($conn->connect_error)
			{
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../register.php\";</script>";
			} 
			else
			{
					$sql = "SELECT * from inventory_table where item_id=$q";
					$result = $conn->query($sql);
					if ($result->num_rows > 0)
					 {
					    while($row = $result->fetch_assoc()) 
					    { 
					    	$sql2 = "SELECT brand_name from brand_table where brand_id = '".$row['brand_id']."'";
							$result2 = $conn->query($sql2);
							$row2 = $result2->fetch_assoc();
					    	?>
							<div class="grid-5 main-nav" >
								<h2><?php echo $row2["brand_name"]." ".$row["item_name"];?></h2>

								<img src="<?php echo "uploads/".$row['item_name'].$row['img_loc']; ?>"  style="width:600px;height:300px;">
								<h3>Price: <?php echo $row["price"];?></h2>
								<!-- 	
								<h3><?php // echo $row["description"];?></h2>
								-->
								<li><a style="background-color: #4d9900" href="#">+ Add To Cart</a></li>
				
							</div>
							<div class="grid-3">
							
							<h3>Description</h3>
							<p><?php echo $row['description'];?></p>
							</div>
					      	<?php
					    }
					} 
					else
					{
					    echo "0 results";
					}
												
			$conn->close();
		}
	?>
	</div>	?>
	<?php include('inc/footer.php'); ?>