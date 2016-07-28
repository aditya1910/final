<?php
include_once('connect.php');

$id=$_SESSION['user_id'];

	$query = mysql_query("SELECT `user_email` FROM student_table WHERE student_id='$id'");
	$row=mysql_num_rows($query);
	if($row==0){
				$query = mysql_query("SELECT `user_email` FROM teacher_table WHERE teacher_id='$id'");
				$row=mysql_num_rows($query);
				}
				
	$row = mysql_fetch_object($query);
			$id = $row->user_email;
			echo $id;


$sql="SELECT * FROM usermail where rec_id='$id'";
$dd=mysql_query($sql);

echo "<div style='margin-left:10px;width:640px;height:auto;border:2px solid red;'>";

	echo "<table border='1' width='640'>";
	echo "<tr><th>Check </th><th>Sender </th><th>Subject </th><th>Date</th></tr>";
while(list($mid,$rid,$user_id,$s,$m,$a,$d)=mysql_fetch_array($dd))
{
	echo "<tr>";
	echo "<form>";
	echo "<td><input type='checkbox' name='ch[]' value='$mid'/></td>";
	echo "<td>".$user_id."</td>";
	if($s=="")
		$s="Message";
	echo "<td><a href='message.php?coninb=$mid'>".$s."</a></td>";
	echo "<td>".$d."</td>";
	echo "</tr>";	
	}
	echo "</table>";
	
	
/*$ch=$_GET['ch'];
foreach($ch as $v)
{

}*/
	


?>
<input type='submit' value='Delete' name='delete'/>
</div></form>