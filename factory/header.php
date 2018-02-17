<?php
@session_start();
if(isset($_SESSION['username']) && $_SESSION['username']){ 	$login = true;
}
include('db.php');
?>
<html>
	<head>
		<title>Factory Enrollment System</title>
		<meta content="Factory,Enrollment" name="keyword">
		<meta content="Factory Enrollment System" name="description">
		<link media="all" href="css/style.css" type="text/css" rel="stylesheet" />
		<script src="js/common.js" type="text/javascript"></script>
	</head>
	<body bgcolor="green" style="">
		<center>
		<table width="950px" bgcolor="#E8E8E8">
			<tr class="header" bgcolor="#EEEEEE">
				<td  align="center">
					<br/>
					<h1>Factory Enrollment System</h1>
					<?php if($login) { ?>
					<table class="menu" width="571px" cellpadding="5">
						<tr>
							<td><a href="index.php" title="Home">HOME</a></td>
							<td><a href="new.php" title="New Employee">NEW EMPLOYEE</a></td>
							<td><a href="list.php" title="List of Employee">EMPLOYEE LIST</a></td>
							<td><a href="search.php" title="Search Employee">SEARCH EMPLOYEE</a></td>
							<td><a href="logout.php" title="Log Out">LOGOUT</a></td>
						</tr>
					</table>
					<?php }else{ ?>
					<table class="menu" width="200px" cellpadding="5">
						<tr>
							<td><a href="index.php" title="Home">HOME</a></td>
							<td><a href="login.php" title="Log In">LOGIN</a></td>
						</tr>
					</table>
					<?php } ?>
				</td>
			</tr>
			
			<tr class="content" bgcolor="#FFFFFF">
				<td height="350px"  align="left" valign="top">
				<br/>