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


<body >
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
	
    
	
	</div>
    
	
	
	</div>


    
	
	    <div id="center" style="float:left; width:100%; ">
	<a href="../main/topics.php" style="font-size:20px; padding-left:30px;">Click to view topics . . .</a>
	<div id="cright" style="float:right; width:72%; color:#363636;margin-top:20px;">
	
	
	<div width="100%" height="400px" scrolling="auto" frameborder="0"><br>
	<pre>
	
	
	
	<img src="../images/rules.jpg" height="700" ></img>
        </pre>
	</div>
	</div>
	</div>
	
	<div id="footer" style="float:left; width:100%; color:#e0e0e0; padding:30px 0px 5px 0px;">
	<center> &copy; Copyright 2013 <a href="http://www.technocracynitrr.org/"><strong>The TechnoCracy </strong></a>(Technical Committee), NIT Raipur. All Rights Reserved. </center>
	</div>
	
</body>
</html>
<?php ob_end_flush(); ?>
