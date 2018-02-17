<?php 
	include('db.php');
	$food_id ='';
	if(isset($_GET['food_id']) && $_GET['food_id'] ){
        $food_id=$_GET['food_id'];
	}
	mysql_query("DELETE FROM `food` WHERE food_id=$food_id");
	header('Location: food_list.php?msg=deleted'); 
?>