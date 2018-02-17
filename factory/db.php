<?php
$dbUser = 'root';
$dbPass = '';
$dbName = 'factory';
$dbConn = mysql_connect ('localhost',$dbUser,$dbPass);
$db = mysql_select_db($dbName);
?>