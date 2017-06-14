<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$i=$_POST['brand'];
		//echo $name.$age.$email.$phone.$address;
		include_once('files/_db/db.conn');
			if($conn->connect_error){
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./manager_home.php\";</script>";
		} 
		else{
			$query="INSERT INTO brand_table( brand_name) values('".$i."')";
			if($conn->query($query) === TRUE){
				echo "<script>alert('Brand Added Successfully! ');window.location=\"./manager_home.php\"</script>";
			} 
			else{
				echo "<script>alert('Some error occurred. Please try after sometime.');window.location=\"./manager_home.php\"</script>";
			}	
			$conn->close();
		}
	}
	else
	{
		$section="create_brand";
		$mytitle="Add Brand";
		include('inc/header.php'); 
?>
	<div class="grid-container">
	
		<div class="grid-8">
			<form action="create_brand.php" method="POST" name="frm_brand" >
				<h2 align ="left">Add Brand</h2>
				<label for="brand">Brand Name</label>
				<input type="text" name="brand" required>
				<input type="submit"  value="Create">
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