<?php 
	include("db.php");
    $cid='';
    $name='';
    $phone='';
    $address='';
    $msg='';
	if(isset($_POST['submit'])){
		$cid = $_POST['cid'];
		$name = addslashes($_POST['name']);
		$phone = addslashes($_POST['phone']);
		$address = addslashes($_POST['address']);
		
		if(!$name){
			$msg .= '<font color="red">Customer name can not empty.</font><br/>';
		}
		if($name && $cid){
			mysql_query("UPDATE `customer` SET name='$name' , phone='$phone' , address='$address' WHERE cid='$cid'");
			header("Location: customer_list.php?msg=update");
		}
	}else if(isset($_GET['cid']) && $_GET['cid']){
        $cid=$_GET['cid'];
        $query = mysql_query("SELECT * FROM `customer` WHERE cid='$cid'");
        $row = mysql_fetch_object($query);
        if(isset($row->cid)){
            $cid=$row->cid;
            $name=$row->name;
            $phone=$row->phone;
            $address=$row->address;
        }
        
    }else{
		header("Location: customer_list.php");
	}
	include("header.php");
?>
	<div><?php echo $msg; ?></div>
    <h2 align="center">Update Customer</h2>
	<form method="post" action="">
		<input type="hidden" name="cid" value="<?php echo $cid;  ?>" />
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