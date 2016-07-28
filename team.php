<?php
require "connect.php"; 
require_once('session.php');

$pid = $_REQUEST['project_id'];

  

	
	$query = " SELECT user_id FROM `team_table` WHERE project_id = '$pid'";
	$result= mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
		echo $row['user_id']."<br>";
	}

?>