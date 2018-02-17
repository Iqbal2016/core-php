<?php 
	include("db.php");
    $name='';
    $phone='';
    $address='';
    $msg='';
	if(isset($_POST['submit'])){
		$name = addslashes($_POST['name']);
		$phone = addslashes($_POST['phone']);
		$address = addslashes($_POST['address']);
		
		if(!$name){
			$msg .= '<font color="red">Customer name can not empty.</font><br/>';
		}
		if($name){
			mysql_query("INSERT INTO `customer` (`name`, `phone`, `address`) VALUES ('$name', '$phone', '$address');") or die(mysql_error());
			header("Location: customer_list.php?msg=new");
		}
	}
	include("header.php");
?>
	<div><?php echo $msg; ?></div>
    <h2 align="center">New Customer</h2>
	<form method="post" action="">
		<table width="80%">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
            </tr>
            <tr>
                <td>Phone</td>
               <td><input type="text" name="phone" value="<?php echo $phone; ?>" /></td>
            </tr>
            <tr>
                <td>Address</td>
               <td><textarea name="address"><?php echo $address; ?></textarea></td>
            </tr>
              <tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Save" /></td>
              </tr>
        </table>
		
	</form>

<?php 
	include("footer.php");
?>