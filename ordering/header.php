<?php 
	@session_start();
	$login = false;
	$userid = '';
	$username = '';
	
	/* Checking for Logged in User */
	if(isset($_SESSION['userid'])){
		$login = true;
		$userid = $_SESSION['userid'];
		$username = $_SESSION['username'];
	}
	
	$today = date("Y-m-d");
?>
<html>
	<head>
		<title>Food Ordering System</title>
	</head>
	<body style="font-family:Tahoma">
		<center>
			<table width="950px" bgcolor="#5A9BAB">
				<tr>
					<td bgcolor="#5A9BAB" height="150px" align="center">
						<br/><h1>Food Ordering System</h1>
						<table cellpadding="5">
							<tr>
								<td><a href="index.php" title="Home" >Home</a></td>
								
								<?php if($login){ ?>
								<td><a href="food_new.php" title="Home" >Food Entry</a></td>
								<td><a href="food_list.php" title="Home" >Food list</a></td>
								<td><a href="order_new.php" title="Home" >New Order</a></td>
								<td><a href="order_list.php" title="Home" >Order List</a></td>
								<td><a href="customer_new.php" title="Home" >New Customer</a></td>
								<td><a href="customer_list.php" title="Home" >Customer List</a></td>
								<td><a href="logout.php" title="Home" >Logout </a>(<?php echo $username; ?>)</td>
								
								<?php }else{ ?>
								
								<td><a href="login.php" title="Home" >Login</a></td>
								
								<?php } ?>
							</tr>
						</table>
					</td> 
				</tr>
				<tr>
					<td bgcolor="#F5F5F5" height="350px" align="center">