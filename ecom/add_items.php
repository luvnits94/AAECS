<script>
function showbrand(str) {
    if (str.length == 0) { 
        document.getElementById("get_brands").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("get_brands").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "files/generate_linked_brand_cat.php?cat=" + str, true);
        xmlhttp.send();
    }
}
function catlist() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("get_catlist").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "files/gen_catlist.php", true);
        xmlhttp.send();
}
</script>



<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$imageFileType = ".".pathinfo(basename($_FILES["img"]["name"]),PATHINFO_EXTENSION);
		$i1=$_POST['item_name'];
		$i2=$_POST['category_id'];
		$i3=$_POST['brand_id'];
		$i4=0;
		$i5=$_POST['price'];
		$i6=$_POST['description'];
		$i7=$imageFileType;
		include_once('files/_db/db.conn');
			if($conn->connect_error){
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./supplier_home.php\";</script>";
		} 
		else
		{
			$query="INSERT INTO inventory_table( item_name,category_id,brand_id,qty,price,description,img_loc) values('".$i1."','".$i2."','".$i3."','".$i4."','".$i5."','".$i6."','".$i7."')";
			//echo $query;
			if($conn->query($query) === TRUE)
			{
				include('files/upload_img.php'); 
				//echo"Getting to upload";
				echo "<script>alert('Item Added successfully!');window.location=\"./supplier_home.php\"</script>";

			} 
			else
			{
				echo "<script>alert('Some error occurred. Please try after sometime.');window.location=\"./supplier_home.php\"</script>";
			}	
			$conn->close();
		}
		exit;
	}
	else
	{	
		session_start();
		$section="add_items";
		$mytitle="Add Items";
		include('inc/header.php'); 
?>
	<h3 align="center">Welcome <?php echo $_SESSION["user"];?></h3>
	<div class="grid-container">
		<div class="grid-6">
			<h3>Please Enter the Details to add the item for sale</h3>				
				<form action="add_items.php" method="POST" name="create_item" enctype="multipart/form-data">
					<table>
						<tr>
							<td>
								<label for="category_id">Choose Category</label>
							</td>
							<td>
								<select name="category_id"  onchange="showbrand(this.value)" onchange="catlist()">
									<span id="catlist">
									<option value=0>Please Choose A Category</option>
									
									<?php include('files/_db/db.conn');
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
									</span>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="brand_id">Choose Brand</label>
							</td>

							<td>
								<span id="get_brands"> 
									<select name="brand_id" disabled="disabled" >
										<options>Choose Brand</options>
									</select>
								</span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="item_name">Enter Item Name</label>
							</td>
							<td>
								<input type="text" name="item_name" required><br>
							</td>
						<tr>
						<tr>
							<td>
								<label for="price">Enter  price :</label>
							</td>
							<td>
								<input type="text" name="price" required><br>
							</td>
						<tr>	
							<td>		
								<label for="description">Enter  Descriptiion</label>
							</td>
							<td>
								<input name="description" type="text"></input><br>
							</td>
						</tr>
						<tr>	
							<td>
								<label for="img">Select image to upload:</label>
							</td>
							<td>
							    <input type="file" name="img" id="fileToUpload" required>
							</td>
						</tr>
						<tr>	
							<td>
								<input type="submit" value="add to the list">
							</td>
					</table>
				</form>	
		</div>
		<div class="grid-4 sub-nav">
			<?php include('inc/supplier_sub-nav.php'); ?>
		</div>
	</div>
	
<?php 
	}
	include('inc/footer.php'); 
?>