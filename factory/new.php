<?php 
	@session_start();
	if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
	if(isset($_POST['submit'])){
		include('db.php');
		$name = addslashes($_POST['name']);
		$fname = addslashes($_POST['fname']);
		$mname = addslashes($_POST['mname']);
		$gender = $_POST['gender'];
		$blood = $_POST['blood'];
		$bdate = addslashes($_POST['bdate']);
		$religion = $_POST['religion'];
		$address = addslashes($_POST['address']);
		$position = addslashes($_POST['position']);
		
		if($name && $gender){
			mysql_query("INSERT INTO `employee` (`name`, `fname`, `mname`, `gender`, `bdate`, `blood`, `religion`, `position`, `address`) VALUES ('$name','$fname','$mname', '$gender', '$bdate', '$blood', '$religion','$position', '$address');") or die(mysql_error());
			
			header("Location: list.php?msg=new");
		}
	}
?>
<?php include('header.php'); ?>
<center>
	<h2>New Employee</h2>
	<div style="width:650px; background-color:#E5E5E5; padding: 10px;">
		<form method="post" action="" >
			<table cellspacing="0" cellpadding="5" width="100%">
					
					<tr>
						<td width="190px"><b>Name:</b></td>
						<td><input type="text" name="name" size="40" value="" /></td>
					</tr>
					
					<tr>
						<td><b>Father's Name:</b></td>
						<td><input type="text" name="fname" size="40" value="" /></td>
					</tr>
					
					<tr>
						<td><b>Mother's Name:</b></td>
						<td><input type="text" name="mname" size="40" value="" /></td>
					</tr>
					
					<tr>
						<td><b>Birth Date:</b></td>
						<td><input type="text" name="bdate" size="10" value="" /> (YYYY-MM-DD)</td>
					</tr>
					
					<tr>
						<td><b>Blood:</b></td>
						<td>
							<input type="text" name="blood" size="8" value="" />
						</td>
					</tr>
					
					<tr>
						<td><b>Gender:</b></td>
						<td>
							<label><input type="radio" name="gender" value="Male" />Male</label>
							<label><input type="radio" name="gender" value="Female" />Female</label>
						</td>
					</tr>
					
					<tr>
						<td><b>Religion:</b></td>
						<td>
							<input type="text" name="religion" size="40" value="" />
						</td>
					</tr>
					
					<tr>
						<td><b>Position:</b></td>
						<td>
							<input type="text" name="position" size="40" value="" />
						</td>
					</tr>
					
					<tr>
						<td><b>Address:</b></td>
						<td><textarea name="address" cols="30" rows="2"></textarea></td>
					</tr>
					
				</table>
				<input type="submit" name="submit" value="Submit" />
		</form>
	</div>
</center>
<?php include('footer.php'); ?>