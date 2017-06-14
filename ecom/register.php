<?php 
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$i1=$_POST['user_type'];
		$i2=$_POST['f_name'];
		$i3=$_POST['l_name'];
		$i4=$_POST['username'];
		$i5=$_POST['password'];
		$i6=$_POST['password_rep'];
		$i7=$_POST['phno'];
		$i8=$_POST['email'];
		$i9=$_POST['city'];
		$i10=$_POST['state'];
		$i11=$_POST['country'];
		$i12=$_POST['zip'];
		include_once('files/_db/db.conn');
			if($conn->connect_error){
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./register.php\";</script>";
		} 
		else{
			$query="INSERT INTO users_table( user_type_id,first_name,last_name,username,password,phone_number,email,city, state, country, zip) values('".$i1."','".$i2."','".$i3."','".$i4."','".md5($i5)."','".$i7."','".$i8."','".$i9."','".$i10."','".$i11."','".$i12."')";
			//echo $query;
			if($conn->query($query) === TRUE){
				echo "<script>alert('Registerd successfully!');window.location=\"./register.php\"</script>";
			} 
			else{
				echo "<script>alert('Some error occurred. Please try after sometime.');window.location=\"./register.php\"</script>";
			}	
			$conn->close();
		}
	}
	else
	{
	$section="none";	
	$mytitle="Registration";
	include('inc/header.php');	
?>
	<div class="grid-container">
		<div class="grid-8">
			<form action="register.php" method="POST" onsubmit="overall_chechk(e)">
				<h2 align ="c">Registration</h2>
				<table align="c" class="grid-8">
					<tr>
						<td>Register As</td>
						<td>
							<select name="user_type" class="form-control">
								<option value="1">Customer</option>
								<option value="2">Supplier</option>
								<option value="3">Manager</option>
							</select>
						</td>
					</tr>
					<tr>
						<td> First Name</td>
						<td><input type="text" name="f_name" class="form-control" required></td>
					</tr>
					<tr>
						<td> Last Name</td>
						<td><input type="text" name="l_name" class="form-control" required></td>
					</tr>
					<tr>
						<td> Username</td>
						<td><input type="text" name="username" class="form-control" required></td>
					</tr>
					<tr>
						<td> Password</td>
						<td><input type="password" name="password" id="password_1" class="form-control" required onchange="password_check()"></td>
					</tr>
					
					<tr>
						<td></td>
						<td id="pass_check" class = "hid"></td>
					</tr>

					<tr>
						<td>Re-Enter Password</td>
						<td><input type="password" name="password_rep" id="password_2" class="form-control" required onchange="password_check()"></td>
					</tr>
					<tr>
						<td></td>
						<td id="pass_recheck" class = "hid"></td>
					</tr>
					<tr>
						<td> Email address</td>
						<td><input type="text" name="email" id="email" class="form-control" required onchange="email_check()"></td>
					</tr>
					<tr>
						<td></td>
						<td id="email_check" colspan="2" class ="hid"></td>
					</tr>

					<tr>
						<td> Phone Number</td>
						<td><input type="text" name="phno" id="phno" class="form-control" required onchange="phone_no_check()"></td>
					</tr>

					<tr>
						<td></td>
						<td id="ph_check" colspan="2" class ="hid"></td>
					</tr>

					<tr>
						<td> City</td>
						<td><input type="text" name="city" class="form-control" required></td>
					</tr>
					<tr>
						<td> State</td>
						<td><input type="text" name="state" class="form-control" required></td>
					</tr>
					<tr>
						<td> Country</td>
						<td><input type="text" name="country" class="form-control" required></td>
					</tr><tr>
						<td> Zip Code</td>
						<td><input type="text" name="zip" class="form-control" required></td>
					</tr>
					<tr>
						<td colspan="4"><input type="submit" class="btn btn-primary" value="Register" required></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="grid-4 sub-nav">
			<?php include('inc/index_sub-nav.php'); ?>
		</div>
	</div>
	
<?php 
	}
	include('inc/footer.php'); 
?>