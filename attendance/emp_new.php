<?php 
	
	if(isset($_POST['submit'])){
		
		include("db.php");
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$bdate = $_POST['bdate'];
		$joining = $_POST['joining'];
		$designation = $_POST['designation'];
		
		$username = $_POST['username'];
		$password = MD5($_POST['password']);
		
		
		mysql_query("INSERT INTO `information` (`name`, `gender`, `bdate`, `joining`, `designation`) VALUES ('$name', '$gender', '$bdate', '$joining', '$designation');") or die(mysql_error());
		
		$empID =  mysql_insert_id();
		
		mysql_query("INSERT INTO `users` (`empID`,`username`, `password`) VALUES ('$empID','$username', '$password');");
		header("Location: emp_list.php?msg=new");
	}
	
	include("header.php");
?>

	<form method="post" action="">
		<table cellpadding="5">
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="" /></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
					<input type="radio" name="gender" value="Male" /> Male
					<input type="radio" name="gender" value="Female" /> Female
				</td>
			</tr>
			<tr>
				<td>Birth Date:</td>
				<td><input type="text" name="bdate" value="" /> (YYYY-MM-DD)</td>
			</tr>
			<tr>
				<td>Joining Date:</td>
				<td><input type="text" name="joining" value="" /> (YYYY-MM-DD)</td>
			</tr>
			<tr>
				<td>Designation:</td>
				<td>
					<input type="text" name="designation" value="" />
				</td>
			</tr>
			
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" value="" /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" value="" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Save" /></td>
			</tr>
		</table>
		
	</form>

<?php 
	include("footer.php");
?>