<?php 
	include("header.php");
	if($login){
		echo 'You already logged in';
	}else{
?>
	<form method="post" action="process_login.php">
		<table>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" value="admin" /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" value="admin" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="login" value="Login" /></td>
			</tr>
		</table>
		
	</form>

<?php 
	}
	include("footer.php");
?>