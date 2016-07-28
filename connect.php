<?php
$username = "root";
$password = "";
$hostname = "localhost"; 
$dbhandle = mysql_connect($hostname, $username, $password);
  mysql_select_db('project')or die("unable to connect"); 
?>