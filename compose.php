<?php
include_once('connect.php');
//require_once('session.php');
@$to=$_POST['to'];
@$sub=$_POST['sub'];
@$msg=$_POST['msg'];
$file=$_FILES['file']['name'];
$id = $_SESSION['user_id'];
	
	$query = mysql_query("SELECT `user_email` FROM student_table WHERE student_id='$id'");
	$row=mysql_num_rows($query);
	if($row==0){
				$query = mysql_query("SELECT `user_email` FROM teacher_table WHERE teacher_id='$id'");
				$row=mysql_num_rows($query);
				}
				
	$row = mysql_fetch_object($query);
			$id=$row->user_email;

			
if(@$_REQUEST['send'])
{
	if($to==""|| $msg=="")
	{
	$err= "fill the related data first";
	}
	
	else
	{
	$d=mysql_query("SELECT * FROM student_table where user_email='$to'");
	$row=mysql_num_rows($d);
	    if($row==0)
			{
				$d=mysql_query("SELECT * FROM teacher_table where user_email='$to'");
				$row=mysql_num_rows($d);
			}
	if($row==1)
		{
		
				$target_dir = "C:\\xampp\htdocs\project\\final\upload\\";
				$target_file = $target_dir . basename($_FILES["file"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				
				// Check if image file is a actual image or fake image
				
				 if($file!=""){
					$check = getimagesize($_FILES["file"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				
				// Check if file already exists
				/*if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}*/
				
				// Check file size
				/*if ($_FILES["file"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}*/
				// Allow certain file formats
				/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "txt" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}*/
				// Check if $uploadOk is set to 0 by an error
				
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				
				//if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
               }else
			   $target_file="No Attachements";
		mysql_query("INSERT INTO usermail values('','$to','$id','$sub','$msg','$target_file',sysdate())");
		$err= "message sent...";
		}
	else
		{
		$sub=$sub."--"."msg failed";
		mysql_query("INSERT INTO usermail values('','$id','$id','$sub','$msg','',sysdate())");
		$err= "message failed...";

		}	
	}
}	


/*if(@$_REQUEST['save'])
{
	if($sub=="" || $msg=="")
	{
	$err= "<font color='red'>fill subject and msg first</font>";
	}
	
	else
	{
	$query="INSERT INTO draft values('','$id','$sub','$file','$msg',sysdate())";
	mysql_query($query);
	$err= "message saved...";
	}
}	*/

	
?>
<head>
	<style>
	input[type=text]
	{
	width:200px;
	height:35px;
	}
	</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<table width="506" border="1">
  <?php echo @$err; ?>
  <tr>
    <th width="213" height="35" scope="row">To</th>
    <td width="277">
	<input type="text" name="to" />	</td>
  </tr>
  <tr>
    <th height="36" scope="row">Subject</th>
    <td><input type="text" name="sub" /></td>
  </tr>
  <tr>
    <th height="36" scope="row">upload your file</th>
    <td><input type="file" name="file" id="file"/></td>
  </tr>
  <tr>
    <th height="52" scope="row">Msg</th>
    <td><textarea rows="8" cols="40" name="msg"></textarea></td>
  </tr>
  <tr>
    <th height="35" colspan="2" scope="row">
	<input type="submit" name="send" value="Send"/>
	<input type="reset" value="Cancel"/>	</th>
  </tr>
</table>

</body>
</form>
</html>
