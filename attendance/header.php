<?php 
	@session_start();
	date_default_timezone_set('Asia/Dhaka');
	$login = false;
	$empID = '';
	$username = '';
	
	/* Checking for Logged in User */
	if(isset($_SESSION['empID'])){
		$login = true;
		$empID = $_SESSION['empID'];
		$username = $_SESSION['username'];
	}
	
	$today = date("Y-m-d");
	
	/* Checking for Office Day */
	include("db.php");
	$query= mysql_query("SELECT * FROM `office_date` WHERE `odate`='$today' ");
	$row = mysql_fetch_object($query);
	
	if(!isset($row->odate)){
		$year = date('Y');
		$month = date('m');
		mysql_query("INSERT INTO `office_date` (`odate`,`month`,`year`,`generate`) VALUES ('$today','$month','$year','1');");
	}
?>
<html>
	<head>
		<title>Attendance System</title>
	</head>
	<body style="font-family:Tahoma">
		<center>
			<table width="950px" bgcolor="green">
				<tr>
					<td bgcolor="#CCCCCC" height="150px" align="center">
						<br/><h1>Attendance System</h1>
						<table cellpadding="5">
							<tr>
								<td><a href="index.php" title="Home" >Home</a></td>
								
								<?php if($login){ ?>
								
									<?php if($username == 'admin'){ ?>
									<td><a href="emp_new.php" title="Home" >New Teacher</a></td>
									<td><a href="emp_list.php" title="Home" >Teacher List</a></td>
									<?php } ?>
								
								<td><a href="punchio.php" title="Home" >Punch In/Out</a></td>
								<td><a href="summary.php" title="Home" >Summary</a></td>
								
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