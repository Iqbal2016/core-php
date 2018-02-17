<?php
$login = '';
$title = 'Home';
include('header.php');
?>
<center><h2 id="page-title">Welcome to Admission Management System.</h2>
<?php
	if($login){
		echo '<p>You are logged in as : '.$_SESSION['username'].'</p>';
	}else{
		echo '<p>Login to access the System</p>';
	}
?>
<p>Select from above menu.</p>
<center>
<?php
include('footer.php');
?>