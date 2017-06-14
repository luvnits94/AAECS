<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$i=$_POST['category'];
		include_once('files/_db/db.conn');
			if($conn->connect_error)
			{
				echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./manager_home.php\";</script>";
			} 
		else
		{
		$query="INSERT INTO category_table(category_name) values('".$i."')";
		if($conn->query($query) === TRUE)
		{
			echo "<script>alert('Category Added Successfully! ');window.location=\"./manager_home.php\"</script>";
		} 
		else
		{
			echo "<script>alert('Some error occurred. Please try after sometime.');window.location=\"./manager_home.php\"</script>";
		}	
		$conn->close();
		}
	}
	else
	{
		$section="create_category";	
		$mytitle="Add Category";
		include('inc/header.php'); 

?>
	<div class="grid-container">
	
		<div class="grid-8">
			<form action="create_category.php" method="POST" name="frm_brand" >
				<h2 align ="left">Add Category</h2>
				<label for="brand">Category Name</label>
				<input type="text" name="category" required>
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