<?php
$dbUser = 'root';
$dbPass = '';
$dbName = 'ordering';
$dbConn = mysql_connect ('localhost',$dbUser,$dbPass);
$db = mysql_select_db($dbName);
?>