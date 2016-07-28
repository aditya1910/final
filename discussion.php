<?php
require "connect.php"; 
require_once('session.php');
require('C:\xampp\htdocs\project\final\twilio-php\Services\Twilio.php'); 
$uid=$_SESSION['user_id'];
//echo $uid;
$pid = $_REQUEST['project_id'];
//echo $pid;
$text=@$_POST['discuss'];
	if($text!= ""){
		$query="INSERT INTO `discussion_table` value('','$pid','$uid','$text',sysdate())";
		mysql_query($query);
		
							 $host = "127.0.0.1";
							 $port = "8800";
							 $username = "Aditya";
							 $password = "adi9926169774";
							 $phoneNoRecip = "+918871833141";
							 $msgText = $text;
							 
												
												 
												$fp = fsockopen($host, $port, $errno, $errstr);
													if (!$fp) {
														echo "errno: $errno \n";
														echo "errstr: $errstr\n";
														return $result;
													}
													
													fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) . " HTTP/1.0\n");
													if ($username != "") {
													   $auth = $username . ":" . $password;
													   $auth = base64_encode($auth);
													   fwrite($fp, "Authorization: Basic " . $auth . "\n");
													}
													fwrite($fp, "\n");
												  
													$res = "";
												 
													while(!feof($fp)) {
														$res .= fread($fp,1);
													}
													fclose($fp);
													//return $res;
		
		
		}else 
		echo '<script language="javascript"> alert("Text field is empty") </script>';
		
	 $query= "SELECT * FROM `discussion_table` WHERE `project_id`='$pid' ORDER BY discussion_date ";
		 $result=mysql_query($query);
			echo "<div style='width: 1000px; border: 3px solid #73AD21;margin-left: 150px;background-color: lightgrey; padding: 25px;''>";
			 while($row=mysql_fetch_array($result))
			{
					$user_id = $row['user_id'];
				    $query= mysql_query("SELECT student_name FROM student_table WHERE student_id= '$user_id'");
					if(mysql_num_rows($query)!=0){
						$name = mysql_result($query,0,'student_name');
						}else{	
							$query= mysql_query("SELECT teacher_name FROM teacher_table WHERE teacher_id= '$user_id'");
							$name = mysql_result($query,0,'teacher_name');
						}
					echo "<ul style='border:1px solid red; background-color:  #00b300; padding: 1px 0px 0px 0px; text-align: center;'>";
					echo "<li>".$name."<br>";
					echo $row['discussion_content'];
					echo "&nbsp&nbsp&nbsp&nbsp".$row['discussion_date']."</li>";
					echo "</ul>";
			}
			echo "</div>";

?>


<html>
<br><br>
<title>Discussion area</title>
<p style= " text-align: center; font-size: 40px; ">Discuss about project here</p>
<div style= "width: 1000px ; border: 3px solid #73AD21;margin-left: 150px;background-color: lightgrey; padding: 25px;" >
	<form method="POST" action="">
	<lable>Compose:</lable><br>
	<input type="text" name="discuss">
	<input type="submit" name="Post" value="submit">
	</form>

</div>


</html>