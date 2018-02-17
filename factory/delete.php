<?php 
	$empID = $_GET['empID'];
	if(!isset($_GET['empID'])){
		header('Location: list.php?error=empID');
	}
	include('db.php');
	
	mysql_query("DELETE FROM `employee` WHERE empID='$empID");
	
	header('Location: list.php?success=del');
?>