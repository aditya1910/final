<?php
	require "connect.php";
	session_start();
			
			
			if(!isset($_POST['user_id']) || !isset($_POST['password']))
			{
				echo "invalid user id and password ";
				header("Location:index.php");
			}
			else
{
			
			$student_id = $_POST['user_id'];  //get user data from form
			$password= $_POST['password'];    //get user password
			$query = "SELECT `student_id` FROM `student_table` WHERE `student_id`='$student_id' AND `password`='$password' ";
			
		if($query_run = mysql_query($query))
			{	
				$query_num_row = mysql_num_rows($query_run);
		
					if($query_num_row!=0)
						{	
							$user_id = mysql_result($query_run, 0, 'student_id');
							$_SESSION['user_id']= $user_id;
							echo $user_id;
							header("Location:project_list.php");
						}
			
			}
			
}
			
?>