<?php 
	include("db.php");
	$name = '';
	$gender = '';
	$bdate = '';
	$joining = '';
	$designation = '';
	$empID = $_GET['empID'];
	
	if(isset($_POST['submit'])){
		
		$name = addslashes($_POST['name']);
		$gender = addslashes($_POST['gender']);
		$bdate = addslashes($_POST['bdate']);
		$joining = addslashes($_POST['joining']);
		$designation = addslashes($_POST['designation']);
		
		if(!$name){
			$msg .= '<font color="red">Name can not empty.</font><br/>';
		}
		
		if(!$gender){
			$msg .= '<font color="red">Gender can not empty.</font><br/>';
		}
		
		if($name && $gender){
			mysql_query("UPDATE `information` SET name='$name' , gender='$gender' , bdate='$bdate', joining='$joining', designation='$designation' WHERE empID='$empID'");
			header("Location: emp_list.php?msg=update");
		}
		
	}else if($empID){
        
		$query = mysql_query("SELECT * FROM `information` WHERE empID='$empID'");
        $row = mysql_fetch_object($query);
        
		if(isset($row->empID)){
            $name=$row->name;
            $gender=$row->gender;
            $bdate=$row->bdate;
            $joining=$row->joining;
            $designation=$row->designation;
        }
        
    }else{
		header("Location: emp_list.php");
	}
	
	include("header.php");
?>

	<form method="post" action="">
		<table cellpadding="5">
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
					<input type="radio" name="gender" value="Male" <?php if($gender == 'Male') echo 'checked="checked"'; ?> /> Male
					<input type="radio" name="gender" value="Female" <?php if($gender == 'Female') echo 'checked="checked"'; ?>/> Female
				</td>
			</tr>
			<tr>
				<td>Birth Date:</td>
				<td><input type="text" name="bdate" value="<?php echo $bdate; ?>" /></td>
			</tr>
			<tr>
				<td>Joining Date:</td>
				<td><input type="text" name="joining" value="<?php echo $joining; ?>" /></td>
			</tr>
			<tr>
				<td>Position:</td>
				<td>
					<input type="text" name="designation" value="<?php echo $designation; ?>" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Save" /></td>
			</tr>
		</table>
		
	</form>

<?php 
	include("footer.php");
?>