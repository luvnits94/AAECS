<?php 
	session_start();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$u=$_POST['username'];
		$p=$_POST['password'];
		include_once('files/_db/db.conn');
		if($conn->connect_error){
			echo "<script>alert('Could not connect to database. Please try after sometime.');window.location=\"./manager_login.php\";</script>";
		} 
		else{
			$query="SELECT * from users_table where username='".$u."' and user_type_id='3'";
			$result = $conn->query($query);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()){
					if($row["password"]==md5($p)){
						$_SESSION["user_id"] = $row["id"];
						$_SESSION["user"]= $row["first_name"];
						echo "<script>alert('Login Success!');window.location=\"./manager_home.php\";</script>";
					}
					else{
						echo "<script>alert('Wrong credentials provided!');window.location=\"./manager_login.php\";</script>";
					}
				}
			}
			else{
				echo "<script>alert('Wrong credentials provided!');window.location=\"./manager_login.php\";</script>";
			}
			
			$conn->close();
		}
	}
	else
	{
		$section="manager_login";
		$mytitle="Manager Login";
		include('inc/header.php'); 
?>
	<div class="main-banner hide-mobile">
		<h2>Welcome Manager</h2>
	</div>
	<div class="grid-container">
		<div class="grid-8">
			<h4>Welcome Manager</h4>
                        <form method="post" action="manager_login.php">
                        <label for="username">Username</label><br/>
                        <input type="text" name="username" class="form-control" placeholder="Enter username here" required><br/><br/>
                        <label for="password">Password</label><br/>
                        <input type="password" name="password" class="form-control" placeholder="Enter password here" required><br/><br/>
                        <button class="btn btn-primary" type="submit">Login</button>
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