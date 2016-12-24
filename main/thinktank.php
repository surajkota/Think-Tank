<?php
ob_start();
include_once('session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="../stylesheet/main.css" />
<script type="text/javascript" src="../script/jquery.js"></script>
</head>
<title>
    ThinkTank
</title>
<body>
<div id="header" style="width:100%; ">
   <div id="hleft" style="float:left; width:20%">
	<img src='../images/bulb.png' style='float:left; width:100%;';/></div>
	<div id="hmain" style="float:left; width:60%">
	<center><img  src='../images/think_tank.png' width="83%" style='float:none; width:75%';/></center>
	</div>
	<div id="hright" style="float:left; width:20%; ">
	<img src='../images/bulb.png' style='float:right; width:100%;' /></div>
	</div>
	
	<div id="center" style="float:left; width:100%; ">
	<div id="cleft" style="float:left; width:25%">
	<center>
	<ul id='ulist'>
	<li class='list' id='basicCube'><a href="home.php">Home</a>
	 
							</li>
        <li class='list' id='5'><a href="rules.php">Rules</a></li>
	<li class='list' id='2'><a href="profile.php">Profile</a></li>
	<li class='list' id='3'><a href="topics.php">Topics</a></li>
<li class='list' id='6'><a href="leaderboard.php">Leaderboard</a></li>
        <li class='list' id='4'><a href="http://www.aavartan.in">Aavartan</a></li>
	</ul>
	</center>
	</div>
	<div id="cright" style="float:right; width:72%; color:#363636;">

	
	
	<img src="../images/rules.png" height="693" ></img>
        
	
	</div>
	</div>
	
	<div id="footer" style="float:left; width:100%; color:#e0e0e0; padding:30px 0px 5px 0px;">
	<center> &copy; Copyright 2011 <a href="http://www.technocracynitrr.org/"><strong>The TechnoCracy </strong></a>(Technical Committee), NIT Raipur. All Rights Reserved. </center>
	</div>
	
</body>
</html>
<?php ob_end_flush(); ?>
