<?php
require_once('session.php');
$id=$_SESSION['user_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NIT RAIPUR</title>
<style>
	a{text-decoration:none}
	a:hover{ background-color:#00CC66}
	#atop{margin-left:50}
</style>
</head>

<body>
<div id="mainbody" style="border:5px groove pink;">
<table width="975" border="1" align="center" ><!--style="background-image:url('theme/<?php
		@$conTheme=$_REQUEST['conTheme'];
		if($conTheme)
		{
			$fo=fopen("userImages/$id/theme","w");
			fwrite($fo,$conTheme);
		}
			@$f=fopen("userImages/$id/theme","r");
			@$fr=fread($f, filesize("userImages/$id/theme"));
			echo $fr;
			?>');"!-->
  
  <tr>
    <td height="115" colspan="3" align="center">
	<div  style="float:left;">
	<?php
	include_once('connect.php');
	error_reporting(1);
	
	$chk=$_GET['chk'];
	if($chk=="logout")
	{
	unset($_SESSION['user_id']);
	header('Location:message.php');
	}
	//$r=mysql_query("select * from userinfo where user_name='{$_SESSION['user_id']}'");
	
	//$row=mysql_fetch_object($r);
	//@$file=$row->image;
	//echo $file;
	//echo "<img alt='image not upload' src='userImages/$id/$file' height='120' width='120'/>"; //profile picture
?></div>
	
	 <div style="float:left;margin-left:300px;padding-top:40px;font-size:25px;text-align:center;color:#00CC66"> Welcome <?php  echo @$_SESSION['user_id'];?>
	 </div>
 	  </td>
  </tr>
  <tr>
    <td height="38" colspan="3">
		<a style="margin-left:50px" href="message.php?chk=logout"></a>
		
	</td>
  </tr>
  <tr>
    <td width="158" height="572" valign="top">
	<div style="margin-top:50px"><a href="message.php?chk=compose">COMPOSE</a><br/><br/>
	<a href="message.php?chk=inbox">INBOX</a><br/><br/>
	<a href="message.php?chk=sent">SENT</a><br/><br/>
	
	</div>
	</td>
    <td width="660" valign="top">
			
			
		<?php
		@$id=$_SESSION['user_id'];
		@$chk=$_REQUEST['chk'];
			if($chk=="vprofile")
			{
			include_once("editProfile.php");
			}
			if($chk=="compose")
			{
			include_once('compose.php');
			}
			if($chk=="sent")
			{
			include_once('sent.php');
			}
			if($chk=="inbox")
			{
			include_once('inbox.php');
			}
			
			
		?>
		
		<!--inbox -->
		<?php
		$id=$_SESSION['user_id'];
		
			$query = mysql_query("SELECT user_email FROM student_table WHERE student_id='$id'");
			$row=mysql_num_rows($query);
			if($row==0){
				$query = mysql_query("SELECT user_email FROM teacher_table WHERE teacher_id='$id'");
				$row=mysql_num_rows($query);
				}
				
			$row = mysql_fetch_object($query);
			$id=$row->user_email;
			//echo $id;     // extract user mail id
		
		
		@$coninb=$_GET['coninb'];
			
			if($coninb)
			{
			$sql="SELECT * FROM usermail where rec_id='$id' and mail_id='$coninb'";
            $dd=mysql_query($sql);
			$row=mysql_fetch_object($dd);
			echo "Subject :".$row->sub."<br/>";
			echo "Message :".$row->msg."<br/>";
			echo "Attachement:".$row->attachement;
			}
			
			
	@$cheklist=$_REQUEST['ch'];
	if(isset($_GET['delete']))
	{
		foreach($cheklist as $v)
		{
		
		$d="DELETE from usermail where mail_id='$v'";
		mysql_query($d);
		}
		echo "msg deleted";
	}
			
		?>
		
		
		
	<!--sent box-->
	<?php
		$id=$_SESSION['user_id'];
		
			$query = mysql_query("SELECT `user_email` FROM student_table WHERE student_id='$id'");
			$row=mysql_num_rows($query);
			if($row==0){
				$query = mysql_query("SELECT `user_email` FROM teacher_table WHERE teacher_id='$id'");
				$row=mysql_num_rows($query);
				}
				
			$row = mysql_fetch_object($query);
			$id=$row->user_email;
		
		
		
		@$consent=$_GET['consent'];
			
			if($consent)
			{
			$sql="SELECT * FROM usermail where sen_id='$id' and mail_id='$consent'";
            $dd=mysql_query($sql);
			$row=mysql_fetch_object($dd);
			echo "Subject :".$row->sub."<br/>";
			echo "Message :".$row->msg;
			}
			
			
	@$cheklist=$_REQUEST['ch'];
	if(isset($_GET['delete']))
	{
		foreach($cheklist as $v)
		{
		$d="DELETE from usermail where mail_id='$v'";
		mysql_query($d);
		}
		echo "msg deleted";
	}
			
		?>	
		
	</td>
    <td width="135">&nbsp;</td>
  </tr>
  <tr>
    <td height="47" colspan="3">
	<h2 align="center">NIT RAIPUR</h2>
	</td>
  </tr>
  
</table>
</div>
</body>
</html>
