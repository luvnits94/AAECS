
			<ul>
				<li <?php if($section == "cus_home"){echo"class='on'";}?>><a href="./customer_home.php" >Customer Home</a></li>
				<li <?php if($section == "browse_products"){echo"class='on'";}?>><a href="./customer_browse_items.php" >Browse Product </a></li>
                <li <?php if($section == "cart"){echo"class='on'";}?>><a href="./customer_cart.php" >Cart</a></li>
               	<li <?php if($section == "logout"){echo"class='on'";}?>><a href="./logout.php" >Logout</a></li>
			</ul>