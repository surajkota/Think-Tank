<?php
ob_start();
include_once('session.php');
?>


<html>
	<html>
	<head>

	<script type="text/javascript" src="../script/think.js"/>
	</script>

	<link rel="stylesheet" type="text/css" href="../stylesheet/main.css" />

	</head>


<title>
    ThinkTank
</title>


<body>
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
    
	
	
	
    
	
	<div id="center" style="width:100%;">
	    <?php
        ob_start();
        include "config.php";
        include_once('session.php');
        if (isset($_SESSION['username']))
        {
            $uname = $_SESSION['username'];
            //echo "<h1>Welcome $uname</h1>";
            $result=mysql_query("select * from topics ORDER BY issued DESC");
            if (mysql_num_rows($result)>0)
            {
               while($rws=mysql_fetch_array($result))
                {
                    
                        echo "<center><div class=roundedCorner ><a href='topic1.php?tpc=".$rws['id']."'style=text-decoration:none;color:white;>".$rws['topic']."</a><br/>Issued on : ".$rws['issued']." Oct"."
                            </div></center><br/><br/>";
                   
                }
		     	}
        }
        else
        {
            echo "<script>alert('You are not logged in. Please log in.')</script>";
            header("refresh: 0; url=http://www.aavartan.com");
        }
        ?>
        <div id="footer" style="float:left; width:100%; color:#e0e0e0; padding:30px 0px 5px 0px;">
	<center> &copy; Copyright 2013 <a href="http://www.technocracynitrr.org/"><strong>The TechnoCracy </strong></a>(Technical Committee), NIT Raipur. All Rights Reserved. </center>
	</div>
    </body>


</html>
<?php
ob_end_flush();
?>
