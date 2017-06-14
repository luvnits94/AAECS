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
        xmlhttp.open("GET", "test1.php?cat=" + str, true);
        xmlhttp.send();
    }
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
		$section="none";
		$mytitle="Add Items";
		include('inc/header.php'); 
?>
	<div class="main-banner hide-mobile">
		<h2>WELCOME Supplier</h2>
	</div>
	<div class="grid-container">
		<div class="grid-8">
			<h3>Primary Content</h3>
			<h3>Please Enter the Details to add the item for sale</h3>				
				<form action="add_items.php" method="POST" name="create_item" enctype="multipart/form-data">
					<label for="category_id">Choose Category</label>
					<select name="category_id" id="cat" onchange="showbrand(this.value)">
					
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
					
					</select>

					<div id="get_brands"> 
						<label for="brands" onclick="showbrand(cat.value)">Choose Brand</label>
						<select name="brands" >
						<options></options>
						</select>
					</div>


					<label for="item_name">Enter Item Name</label>
					<input type="text" name="item_name" required><br>
					<label for="price">Enter  price :</label>
					<input type="text" name="price" required><br>
					<label for="description">Enter  Descriptiion</label>
					<input name="description" type="text"></input><br>
					<label for="img">Select image to upload:</label>
				    <input type="file" name="img" id="fileToUpload" required>
					<input type="submit" value="add to the list">
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