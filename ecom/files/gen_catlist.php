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
			    { 

			    		echo"<option >fuckoff</option>"
			    		//echo"<option value="$row['category_id']">"$row['category_name'];"</option>";
			      	
			    }
			} 
			else
			{
			    echo "0 results";
			}					
			$conn->close();
		}
	?>