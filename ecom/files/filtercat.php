<?php

$q = $_REQUEST["cat"];
$var="";

// lookup all hints from array if $q is different from "" 
include('_db/db.conn');
			if($conn->connect_error)
			{
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../register.php\";</script>";
			} 
			else if($q != -1)
			{
					$sql = "SELECT * from inventory_table where category_id = '".$q."'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0)
					 {
					    while($row = $result->fetch_assoc()) 
					    { 
					    	$sql2 = "SELECT brand_name from brand_table where brand_id = '".$row['brand_id']."'";
					    	$result2 = $conn->query($sql2);
					    	$row2 = $result2->fetch_assoc();
							$var.= "<div class='grid-5 main-nav'>
								<h2>".$row2['brand_name'].'	  '.$row['item_name']."</h2>
								<img src='uploads/".$row['item_name'].$row['img_loc']."' style='width:400px;height:200px;'>
								<h3>Price:".$row['price']."</h2>
								<li><a style='background-color: #4d9900' href='#'>+ Add To Cart</a></li>
								<li><a style='background-color: #4d9900' href='./view_details.php?item_id=".$row['item_id']."'>view Detais</a></li>
							</div>";
					    }
					    echo $var;
					} 
					else
					{
					    echo "0 Items";
					}	
					$conn->close();
			}
			else
			{
				$sql = "SELECT * from inventory_table ";
					$result = $conn->query($sql);
					if ($result->num_rows > 0)
					 {
					    while($row = $result->fetch_assoc()) 
					    { 
					    	$sql2 = "SELECT brand_name from brand_table where brand_id = '".$row['brand_id']."'";
					    	$result2 = $conn->query($sql2);
					    	$row2 = $result2->fetch_assoc();
							$var.= "<div class='grid-5 main-nav'>
								<h2>".$row2['brand_name'].'	  '.$row['item_name']."</h2>
								<img src='uploads/".$row['item_name'].$row['img_loc']."' style='width:400px;height:200px;'>
								<h3>Price:".$row['price']."</h2>
								<li><a style='background-color: #4d9900' href='#'>+ Add To Cart</a></li>
								<li><a style='background-color: #4d9900' href='#'>view Detais</a></li>
							</div>";
					    }
					    echo $var;
					} 
					else
					{
					    echo "0 Items";
					}	
					$conn->close();
			}

?>