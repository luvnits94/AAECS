<?php 
	include_once('files/_db/db.conn');
	if($conn->connect_error){
		echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./register.php\";</script>";
	} 
	else
	{
		if(isset($_REQUEST["del_item_id"]))
		{
			$sqldel = "DELETE from cart_item_table where item_id=".$_REQUEST['del_item_id'];
			echo $sqldel;
			if($conn->query($sqldel) === TRUE){
				echo "<script>alert('Item Deleted Successfully');window.location=\"./customer_cart.php\"</script>";
			} 
			else{
				echo "<script>alert('Some error occurred. Please try after sometime.');window.location=\"./customer_cart.php\"</script>";
			}	
			$conn->close();
		}
	}
	?>