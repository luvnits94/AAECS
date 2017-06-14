<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$i1=$_POST['category_id'];
		$i2=$_POST['brand_id'];	
		include_once('files/_db/db.conn');
			if($conn->connect_error){
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./manager_home.php\";</script>";
		} 
		else{
			$query="INSERT INTO brand_category_table(category_id,brand_id) values('".$i1."','".$i2."')";
			if($conn->query($query) === TRUE){
				//include('upload_img.php'); 
				echo "<script>alert('Brand And Category Linked Successfully!');window.location=\"./manager_home.php\"</script>";

			} 
			else{
				echo "<script>alert('Some error occurred. Please try after sometime.');window.location=\"./manager_home.php\"</script>";
			}	
			$conn->close();
		}
	}
	else
	{
		$section="link_brand_category";
		$mytitle="Manager Home";
		include('inc/header.php'); 
?>
	<div class="grid-container">
	
		<div class="grid-8">
			<form action="link_brand_category.php" method="POST" name="frm_brand" >
			<h1>Link Brand And Categories</h1>
			<table>
				<tr>
					<td>
						<label for="category_id">Choose Category</label>
					</td>
					<td>
						<select name="category_id" value="select">
							<?php
									include('files/_db/db.conn');
										if($conn->connect_error)
										{
										echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../register.php\";</script>";
										} 
										else
										{
												$sql = "SELECT category_id, category_name FROM category_table";
												$result = $conn->query($sql);
												if ($result->num_rows > 0)
												 {
												    // output data of each row
												    while($row = $result->fetch_assoc()) 
												    { ?>
												    	<option value=<?php echo $row["category_id"]; ?>><?php  echo $row["category_name"]; ?></option>
												       
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
						</select><br>
					</td>
					<tr>
						<td>
							<label for="brand_id">Choose Brand</label>
						</td>
						<td>
							<select name="brand_id" value="select">
								<?php
										include('files/_db/db.conn');
											if($conn->connect_error)
											{
											echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../index.php\";</script>";
											} 
											else
											{
													$sql = "SELECT brand_id, brand_name FROM brand_table";
													$result = $conn->query($sql);
													if ($result->num_rows > 0)
													 {
													    // output data of each row
													    while($row = $result->fetch_assoc()) 
													    { ?>
													    	<option value=<?php echo $row["brand_id"]; ?>><?php  echo $row["brand_name"]; ?></option>
													       
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
							</select><br>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit"  value="Link">
							</td>
						</tr>
				</table>
			</form>
		</div>
		<div class="grid-4 sub-nav">
			<?php include('inc/manager_sub-nav.php'); ?>
		</div>
	</div>
	
<?php 
	}
	include('inc/footer.php');
?>