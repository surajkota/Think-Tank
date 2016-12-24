<?php
ob_start();
include_once('session.php');
?>


<html>
	<html>
	<head>
<script type="text/javascript" src="../script/jquery.min.js"></script>
	<script type="text/javascript" src="../script/think.js"/>
	</script>

	<script type="text/javascript">


$(document).ready(function(){
      $("button").click(function(){
	  
	  $.post("leaderboard.php",{},
    function(data,status,xhr){
      //alert("\nStatus: " + status);
	  $("#cleft").html(data);
	  
	});
  });
});

</script>

	<link rel="stylesheet" type="text/css" href="../stylesheet/main.css" />

	</head>


<title>
    ThinkTank
</title>


<body onload="leaderboard();" style="color:#AFA;">
	<div id="header" style="width:100%; height:150px; ">
  		 <div id="hleft" style="float:left; height:150px; width:20%">
		   <a href="http://www.aavartan.in"><img src='../logoaavartan.png' style="float:left; height:100px; width:100px"/></a>
		 </div>
		 
		<div id="hmain" style="float:left; height:150px; width:60%">
	   	 <center><img  src='../images/tank.png' style='float:left; padding:50 0 0 0px; height:100px; width:18% ';/><span><img  src='../images/think tank.png' style='float:left; padding:20 0 0 70px; height:130px;   width:55%';/></span></center>
	 	 </div>
		 <div id="hright" style="float:left; height:150px;">
	    	<img src='../imgnew/side.png' style='float:left; height:150px; width:150px;' />
	        </div>	
		
		
	 	
	</div>

	<br><br>
	<div id="new" align="center" style="width:54%; border-radius:20px; margin:0 auto; height:70px; background-color:#D6D6D6;">
	
	
	<div id="1" class="cubes" >
	
	<a href="home.php" ><img src="../imgnew/h.png" title="Home" class="cubes1" /></a>
	</div>
	<div id="11" class="cubes2" ></div>
	<div id="5" class=cubes style="width=20%;">
	
	<a href="rules.php"><img src="../imgnew/rules.png" title="Rules" class="cubes1"/></a>
	</div>
	<div id="55" class="cubes2" ></div>
	<div id="2" class=cubes style="width=20%;">
	
	<a href="profile.php"><img src="../imgnew/profile.png" title="Profile" class="cubes1"/></a>
	</div>
	<div id="22" class="cubes2" ></div>
	<div id="3" class=cubes style="width=20%;">
	
	<a href="topics.php"><img src="../imgnew/t.png" title="Topics" class="cubes1"/></a>
	</div>
	
	
	</div>
	
    
	
	
    
	
	<div id="cright" style="float:right; width:72%; color:#AFA;">
	
	<div width="100%" height="400px" scrolling="auto" frameborder="0"><br>
	<?php //ob_end_flush(); ?>
<?php
//ob_start();
include "config.php";
include_once('session.php');
if (isset($_SESSION['username']) and isset($_SESSION['email']))
{
    $uname = $_SESSION['username'];
	$email=$_SESSION['email'];
    echo "<h1> $uname</h1>";
    $entry = $_POST['entry'];
	$tpc=$_GET['tpc'];
	if(strlen($entry)<10)
	{
		echo "<h3>Your entry is too short</h3>";
	}
	else
	{
	date_default_timezone_set ( 'Asia/Kolkata' );
	$dt = date('Y-m-d H:i:s');
    $result=mysql_query("select topic from topics where id=$tpc" /*and check the date*/);
    $rws=mysql_fetch_array($result);
	$topic = $rws['topic'];
echo "$topic";
    mysql_query("insert into thinktank values('$uname','$email','$topic','$entry',0,'$dt')" /*and check the date*/) or die("</br>Check the number of characters.");
    mysql_query("insert into likes values('$topic','$email','$email')")
    or die("some error");
    echo "<h3>Your entry is accepted!</h3>";
    header("refresh: 1; url=home.php");}
}
else
{
    echo "<script>alert('You are not logged in. Please log in.')</script>";
    header("refresh: 0; url=http://www.aavartan.in");
}
ob_end_flush();
?>
	</div>
	</div>
	</div>
	
	<div id="footer" style="float:left; width:100%; color:#e0e0e0; padding:30px 0px 5px 0px;">
	<center> &copy; Copyright 2013 <a href="http://www.technocracynitrr.org/"><strong>The TechnoCracy </strong></a>(Technical Committee), NIT Raipur. All Rights Reserved. </center>
	</div>
	
</body>
</html>
