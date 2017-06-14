<script>
	function filterbycat(str) 
	{
	    if (str.length > 0 ) 
	    {
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("items").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET", "files/filtercat.php?cat=" + str, true);
	        xmlhttp.send();
	    }
	}
</script>
<label for="category_id">Filter by :Category</label>
<select name="category_id"  onchange="filterbycat(this.value)">
	<option value=-1>All</option>
	<?php
		include('files/_db/db.conn');
			if($conn->connect_error)
			{
				echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../index.php\";</script>";
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

