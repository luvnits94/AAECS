<?php
	$target_dir = "uploads/";
	$target_file = $target_dir . $i1.".";
	$uploadOk = 1;
	$imageFileType = pathinfo(basename($_FILES["img"]["name"]),PATHINFO_EXTENSION);
	$target_file .= $imageFileType;
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) 
	{
	    $check = getimagesize($_FILES["img"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	else 
	{
	    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
?>