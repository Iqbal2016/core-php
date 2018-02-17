<?php 
	
	include("db.php");
    $food_name='';
    $food_code='';
    $price='';
    $description='';
    $msg='';
    
	if(isset($_POST['submit'])){
		
		$food_name = addslashes($_POST['food_name']);
		$food_code = addslashes($_POST['food_code']);
		$price = $_POST['price'];
		$description = addslashes($_POST['description']);
		if(!$food_name){
			$msg .= '<font color="red">Food name can not empty.</font><br/>';
		}
		if(!$price){
			$msg .= '<font color="red">Food price can not empty.</font><br/>';
		}
		if($food_name && $price){
			mysql_query("INSERT INTO `food` (`food_id`, `food_name`, `food_code`, `price`, `description`) VALUES (NULL, '$food_name', '$food_code', '$price', '$description');");
			header('Location: food_list.php?msg=new');
		}
	}
	
	include("header.php");
?>
	<div><?php echo $msg; ?></div>
	<h2 align="center">New Food</h2>
	<form method="post" action="">
		<table cellpadding="5" width="80%">
			<tr>
				<td>Food Name:</td>
				<td><input type="text" name="food_name" value="<?php echo $food_name; ?>" /></td>
			</tr>
			<tr>
                <td>Code:</td>
				<td><input type="text" name="food_code" value="<?php echo $food_code; ?>" /></td>
			</tr>
			<tr>
                <td>Price:</td>
				<td><input type="text" name="price" value="<?php echo $price; ?>" /></td>
			</tr>
            <tr>
			<tr>
                <td>Description:</td>
				<td><textarea name="description" ><?php echo $description; ?></textarea></td>
			</tr>
            <tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Save" /></td>
			</tr>
		</table>
		
	</form>

<?php 
	include("footer.php");
?>