<?php 
	include('db.php');
	$empID ='';
	if(isset($_GET['empID']) && $_GET['empID'] ){
        $empID=$_GET['empID'];
	}
	mysql_query("DELETE FROM `information` WHERE empID=$empID");
	mysql_query("DELETE FROM `users` WHERE empID=$empID");
	
	header('Location: emp_list.php?msg=deleted'); 
?>