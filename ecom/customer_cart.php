<?php
	session_start();
	$section="cart";
	$mytitle="Cart"; 
	include('inc/header.php');
 ?>

	<div class="grid-container fix">
		<div>
			
		</div>
		<div class="grid-12 main-nav">
			<?php include('inc/customer_sub-nav.php'); ?>
			<br>
		</div>
	</div>


	<div class="grid-container">
	<?php
	
		include('files/_db/db.conn');
			if($conn->connect_error)
			{
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../register.php\";</script>";
			} 
			else
			{

					$sql = "SELECT * from cart_item_table where cart_id=".$_SESSION["user_id"];
					$result = $conn->query($sql);
					if ($result->num_rows > 0)
					 {
					 	$sum =0;
					    while($row = $result->fetch_assoc()) 
					    { 
					    	$sql2 = "SELECT * from inventory_table where item_id = '".$row['item_id']."'";
							$result2 = $conn->query($sql2);
							$row2 = $result2->fetch_assoc();


							$sql3 = "SELECT * from brand_table where brand_id = '".$row2['brand_id']."'";
							$result3 = $conn->query($sql3);
							$row3 = $result3->fetch_assoc();
					    	?>
							<div class="grid-5 main-nav" >
								<?php $t=$row["qty"]*$row2["price"]?>
								

								<img src="<?php echo "uploads/".$row2['item_name'].$row2['img_loc']; ?>"  style="width:400px;height:200px;">
				
								<h2><?php echo $row3["brand_name"]."  ".$row2["item_name"];?></h2>
								<h3>Price: <?php echo $row2["price"];?></h2>
								<h3>Quantity: <?php echo $row["qty"];?></h2>
								<h3>Sub Total: <?php echo $t;?></h2>
								<li><a style="background-color: #4d9900" href="./process_del_items.php?del_item_id=<?php echo $row['item_id']; ?>"> - Delete From Cart</a></li>
								<li><a style="background-color: #4d9900" href="./view_details.php?item_id=<?php echo $row['item_id']; ?>" >view Detais </a></li>
								<br><br><br><br><br><br><br><br>
								<?php $sum= $sum+$t?>
							</div>
					      	<?php
					    }?>
					    </div>
						<hr>
						<h3 align="center">Total = <?php echo $sum;?></h3>
					    
					    <?php


					} 
					else
					{
					    echo "0 results";
					    ?>
					    </div>
					    <?php
					}
												
			$conn->close();
		}
	?>
	

	<?php include('inc/footer.php'); ?>