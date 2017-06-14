<?php
$q = $_REQUEST["cat"];
// lookup all hints from array if $q is different from "" 
include('_db/db.conn');
			if($conn->connect_error)
			{
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"../register.php\";</script>";
			} 
			else
			{
				if($q == -5)
				{
					$sql = "SELECT DISTINCT brand_id from brand_category_table ";
				}
				else
				{
					$sql = "SELECT brand_id from brand_category_table where category_id = '".$q."'";
				}
				$result = $conn->query($sql);
				if ($result->num_rows > 0)
				 {
				 	$var="<select name='brand_id' value='select'>";
				    while($row = $result->fetch_assoc()) 
				    { 
				    	$var .="<option value=".$row["brand_id"].">";
				    	$sql2 = "SELECT brand_name from brand_table where brand_id = '".$row["brand_id"]."'";
				    	$result2 = $conn->query($sql2);
				    	while($row2 = $result2->fetch_assoc()) 
				    	{ 		
				    		$var .= $row2["brand_name"]."</option>";
				    	}
				    }
				    $var .="</select>";
				    echo $var;
				    exit;
				} 
				else
				{
				    echo "No Brands Found . Please Choose Another Category" ;
				}				
				$conn->close();
			}
?>