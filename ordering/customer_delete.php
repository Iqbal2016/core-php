<?php 
	include('db.php');
	$cid ='';
	if(isset($_GET['cid']) && $_GET['cid'] ){
        $cid=$_GET['cid'];
	}
	mysql_query("DELETE FROM `customer` WHERE cid=$cid");
	header('Location: customer_list.php?msg=deleted'); 
?>