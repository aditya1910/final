<?php
	
	if(isset($_POST['project']))
	{
	require "connect.php";
	session_start();
	$user_id = $_SESSION['user_id'];
	
	$project_name = $_POST['project'] ;
	
	$query= mysql_query("INSERT INTO `project_table` values('','$project_name',sysdate())");
	
	$query=mysql_query("SELECT `project_id` FROM `project_table` Where `project_name`= '$project_name'");         // select PID
	$project_id = mysql_fetch_row($query);   // Get project Id
	
	//echo $project_id[0]."<br>";  // Display PID
	
	$query= mysql_query("INSERT INTO `team_table` values('$project_id[0]','$user_id')");                // insert into team table 
	
	$roll_no= $_POST['student_rollno'];
	
	
	foreach($roll_no as $s)
	    {
		$query= "INSERT INTO `team_table` values('$project_id[0]','$s')";                // insert into team table 
		 mysql_query($query);
		}

     echo "<b>Project added ";
	}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
		<script type="text/javascript" src="js/script.js"></script> 
    </head>
    <body>    
          <form action="" class="register" method="POST">
            <h1>Project Details</h1>
			<h2><a href = project_list.php> <B>HOME </a></h2>
			<fieldset class="row1">
                <legend>Project Information</legend>
				
                <p>
					<label>Project Name
                    </label>
                    <input name="project" required="required" type="text"/>
                </p>
				<div class="clear"></div>
            </fieldset>
            <fieldset class="row2">
				<legend>Student Details</legend>
				<p> 
					<input type="button" value="Add student" onClick="addRow('dataTable')" /> 
					<input type="button" value="Remove student" onClick="deleteRow('dataTable')"  /> 
					<p>(All acions apply only to entries with check marked check boxes only.)</p>
				</p>
               <table id="dataTable" class="form" border="1">
                  <tbody>
                    <tr>
                      <p>
						<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
						<td>
							<label>Name</label>
							<input type="text" required="required" name="BX_NAME[]">
						 </td>
						<td>
							<label>Roll No.</label>
							<input type="text" required="required" name="student_rollno[]">
						 </td>
							</p>
                    </tr>
                    </tbody>
                </table>
				<div class="clear"></div>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information</legend>
				<p>This is for only teachers use </p>
				<div class="clear"></div>
            </fieldset>
            
			<input class="submit" type="submit" value="Confirm &raquo;" />
			<div class="clear"></div>
        </form>
		
    </body>
	<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9046834; 
var sc_invisible=1; 
var sc_security="ec55ba17"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="free hit
counter" href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9046834/0/ec55ba17/1/"
alt="free hit counter"></a></div></noscript>
</html>





