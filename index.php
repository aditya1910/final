<?php

?>
		<html>
		<head>
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		
	 
			<div id="header">
			<div id="tagline">
				<h3>Project Management</h3>
			</div>
			
			<div class="nav">
			  <ul>
				<li class="home"><a href="#">Home</a></li>
				<li class="tutorials"><a class="active" href="#">Tutorials</a></li>
				<li class="about"><a href="#">About</a></li>
				<li class="contact"><a href="#">Contact</a></li>
			  </ul>
			</div>
			
			
			
			</div><!--end header -->
			
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
			bottom: 0px;
			width: 100%;
			background: grey;
			padding-top: 20px;
			padding-bottom:60px;
			margin-top: 40px;
			color: Blue;
			float: bottom;
			height: 50px;
			color:black;
			
		}
			
			
			</style>
			
		</head>
		<body style="background:#cccccc;">
		<div style="position:absolute; top:200px;left:400px; ">
		<form name="frmUser" method="post" action="login.php">
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
		<tr class="tableheader">
		<td align="center" colspan="2">Enter Login Details</td>
		</tr>
		<tr class="tablerow">
		<td align="right">User ID</td>
		<td><input type="text" name="user_id"></td>
		</tr>
		<tr class="tablerow">
		<td align="right">Password</td>
		<td><input type="password" name="password"></td>
		</tr>
		<tr class="tableheader">
		<td align="center" colspan="2"><input type="submit" name="submit" value="student"><input type="submit" name="submit" value="teacher"></td>
		</tr>
		</table>
		</form>
		</div>
		
		<div id="footer">
        <div class="container">
            <p>Copyright 2015 <br/>  Aditya <br/> Dilesh<br/>
            NIT RAIPUR</p>
        </div><!--end footer container-->
       </div><!--end footer-->
		
		
		</body></html>
		