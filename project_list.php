<?php
require "connect.php"; 
require_once('session.php');
$user_id = $_SESSION['user_id'];
			
			$query = "select * from teacher_table where teacher_id= '$user_id' "; 
			$rows = mysql_num_rows(mysql_query($query));  // count the no. of return row
			if ($rows == 1) {
				echo "<a href='add_project.php'> Add Project </a><br><br>";
			
			}
			/*else {
			
				$query = "select * from `student_table` where `student_id`= '$user_id' "; 
				$rows = mysql_num_rows(mysql_query($query));  // count the no. of return row
				 if ($rows == 1){*/
				 
				
			
			
			
            $query = " select `project_name` from project_table , team_table where project_table.project_id = team_table.project_id and user_id = '$user_id'";
			$result= mysql_query($query);
			$project_name = array();
			echo "<b  style='color:#e5f9ff; margin-left:150px;background-color: green; font-size: 20px;padding: 1px 526px 1px 400px;'> List of Projects</b><br>";
		   echo "<div style='width: 1000px; height: 1000px; border: 3px solid #73AD21;margin-left: 150px;background-color: lightgrey; padding: 25px;'>";
			while($row=mysql_fetch_array($result))
		{
				$project_name= $row['project_name'];
				$query=mysql_query("SELECT `project_id` FROM `project_table` WHERE `project_name`='$project_name'");  // get project id 
				
				$id = "'project_front.php?project_id=".mysql_result($query,0,"project_id") . "'";
			//	echo $id;
				echo "<ul style='border:1px solid red; background-color: #00b300; padding: 1px 0px 0px 0px; text-align: center;'>";
				
				echo "<a href=" .$id."> ".$row['project_name'] ."</a> ";           // link to projects 
				
				echo "<br>";
				echo "</ul>";
		}
		echo "</div>";
		
		
	//}
	//}
			
		

			
		
		
	
 ?> 
 
 
