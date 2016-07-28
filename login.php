<?php
	require "connect.php";
	session_start();
	
	$user_id = $_POST['user_id'];  //get user data from form
	$password= $_POST['password'];    //get user password
	$user=$_POST['submit'];
	//echo $user;
			
			
		if(isset($user_id) && isset($password))
			{
				if($user=="student")
				{ 	
					echo "Student's login";
					$query = "SELECT `student_id` FROM `student_table` WHERE `student_id`='$user_id' AND `password`='$password' ";
					$rows = mysql_num_rows(mysql_query($query));
						if($rows!=0)
						{
							$query_run = mysql_query($query);
							$user_id = mysql_result($query_run, 0, 'student_id');
							$_SESSION['user_id']= $user_id;
							echo $user_id;
							header("Location:project_list.php");
						}
				}
			
			 if($user=="teacher")
		{
		
			echo "Teacher's login";
			$query = "SELECT `teacher_id` FROM `teacher_table` WHERE `teacher_id`='$user_id' AND `password`='$password' ";
			$rows = mysql_num_rows(mysql_query($query));
			if($rows!=0)
			{
				if($query_run = mysql_query($query))
				{	
				$query_num_row = mysql_num_rows($query_run);
		
					if($query_num_row!=0)
						{	
							$user_id = mysql_result($query_run, 0, 'teacher_id');
							$_SESSION['user_id']= $user_id;
							echo $user_id;
							header("Location:project_list.php");
						}
			
				}
			}
			
		}	
			
			
	} 
	else
	{
	echo "Enter correct user id ";
	header("Location:index.php");
	}		

?>
	
	
	
	
	
	




