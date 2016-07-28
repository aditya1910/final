<?php
require_once('session.php');
$pid= $_REQUEST['project_id'];  // accept project ID
//echo $pid;
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>project front page</title>
			<style>
			#tabs ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
			}

		    #tabs {
				float: left;
				position:absolute;
				width:100%;
			}

			#tabs a:link {
				display: block;
				width: 100%;
				height:50px;
				font-weight: bold;
				color: BLUE;
				background-color: #98bf21;
				text-align: center;
				padding: 4px;
				text-decoration: none;
				text-transform: uppercase;
			}

			#tabs a:hover, a:active {
				background-color: #7A991A;
			}
			</style> 
	
</head>
<body>
		<div id="tabs" >
			<ul>
				<li><a  href = "discussion.php?project_id= <?php echo $pid ?>"> Discussion </a></li>
				<li><a href = "team.php?project_id= <?php echo $pid ?>"> team </a></li>
				<li><a href = "file.php?project_id= <?php echo $pid ?>"> files </a></li>
				<li><a href = "message.php?project_id= <?php echo $pid ?>">message</a></li>
			</ul>
		</div>
		
		<script type="text/javascript" scr = "js/jquery.js"></script>
		<script type="text/javascript" scr = "js/jquery-ui.js"></script>
		<script type="text/javascript" scr ="js/ui.js"></script>
</body>

</html>