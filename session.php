<?php

session_start();


if (!isset($_SESSION['user_id'])) {
header('Location: index.php');
}

?>
<html>

<head>
<title>Secured Page</title>
</head>


	<div id="header">
			<div id="tagline">
				<h3>Project Management</h3>
			</div>
			
			<div class="nav">
			  <ul>
				<li class="home"><a href="project_list.php">Home</a></li>
				<li class="tutorials"><a class="active" href="#">Tutorials</a></li>
				<li class="about"><a href="#">About</a></li>
				<li class="news"><a href="#">Newsletter</a></li>
				<li class="contact"><a href="logout.php">Logout</a></li>
			  </ul>
			</div>
			
		
			
	<style>
			
					.nav ul {
					  list-style: none;
					  background-color: #444;
					  text-align: center;
					  padding: 0;
					  margin: 0;
					}
					.nav li {
					  font-family: 'Oswald', sans-serif;
					  font-size: 1.2em;
					  line-height: 40px;
					  height: 40px;
					  border-bottom: 1px solid #888;
					}
					 
					.nav a {
					  text-decoration: none;
					  color: #fff;
					  display: block;
					  transition: .3s background-color;
					}
					 
					.nav a:hover {
					  background-color: #005f5f;
					}
					 
					
					 
					@media screen and (min-width: 600px) {
					  .nav li {
						width: 120px;
						border-bottom: none;
						height: 50px;
						line-height: 50px;
						font-size: 1.4em;
					  }
					 
					  /* Option 1 - Display Inline */
					  .nav li {
						display: inline-block;
						margin-right: -4px;
					  }
					 
					  /* Options 2 - Float
					  .nav li {
						float: left;
					  }
					  .nav ul {
						overflow: auto;
						width: 600px;
						margin: 0 auto;
					  }
					  .nav {
						background-color: #444;
					  }
					  */
					}
										
					
					
					ul#menu {
					list-style: none; 
				}
				 
				ul#menu li a {
					font-size: 20px;
					color: #676666;
					text-decoration: none; 
					text-align:center;
				}
			
						ul#menu li {
					float: top; 
					list-style: none;
					padding-top: 55px; 
					float: left;
					float: left;
					background:black;
					padding-left: 30px;
					padding-right: 75px; 
				}			
			
			#tagline h3 {font-size: 30px; color: #e4dfdf; }
			
						#tagline {
				position:static;
				top:20px;
				padding-top: 0px;
				padding-left: 50px; 
				height= 50px;
				width: 100%;
				background:#cccccc;
				
			}
			
			
			#footer {
			position: absolute;
			top: 1100px;
			width: 100%;
			background: grey;
			padding-top: 20px;
			padding-bottom:60px;
			margin-top: 40px;
			color: Blue;
			float: bottom;
			height: 50px;
			
		}
			
			
			</style>



<body style="background:#cccccc;">

<p>Welcome: <b><?php echo $_SESSION['user_id']; ?></b>
<br></p>


</body>

</html>