<?php
	session_start();
	if(isset($_REQUEST["item_id"]))
	{
		include_once('files/_db/db.conn');
		if($conn->connect_error)
		{
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./customer_login.php\";</script>";
		} 
		else
		{
			$query="INSERT INTO cart_item_table(cart_id,item_id) values('".$_SESSION['user_id']."','".$_REQUEST['item_id']."')";
			if($conn->query($query) === TRUE){
				echo "<script>alert('Item Added To Cart');</script>";
			}
		}
	}

	$section="browse_products";
	$mytitle="Customer Home"; 
	include('inc/header.php');
 ?>

	<div class="grid-container fix">
		<div class="grid-3">
			<?php include('inc/filters.php'); ?>
		</div>
		<div class="grid-9 main-nav">
			<?php include('inc/customer_sub-nav.php'); ?>
			<br>
		</div>
	</div>


	<div class="grid-container" id="items" >
	<?php
	
		include('files/_db/db.conn');
			if($conn->connect_error)
			{
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../register.php\";</script>";
			} 
			else
			{
					$sql = "SELECT * from inventory_table";
					
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
								<h2><?php echo $row2["brand_name"]."  ".$row["item_name"];?></h2>

								<img src="<?php echo "uploads/".$row['item_name'].$row['img_loc']; ?>"  style="width:400px;height:200px;">
								<h3>Price: <?php echo $row["price"];?></h2>
								<!-- 	
								<h3><?php // echo $row["description"];?></h2>
								-->
								<li><a style="background-color: #4d9900" href="./customer_browse_items.php?item_id=<?php echo $row['item_id']; ?>" >+ Add To Cart</a></li>
								<li><a style="background-color: #4d9900" href="./view_details.php?item_id=<?php echo $row['item_id']; ?>" >view Detais </a></li>
				
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