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
	
    
	
	</div>
    
	
	<div id="center" style="width:100%;">
	<div style="float:left; width:25%; height:100%">
	<div id="111" align="center"style="float:left; width:100%; color:white; font-family:Times New Roman, Times, serif; font-style:oblique; font-size:30px; margin-top:100px;">
	Beat Them Up !!!
	<div id="cleft" width="100%" height="100px" scrolling="auto" frameborder="0" ><br>
	</div>
	<button id="LB" style="display:none">Refresh Leaderboard</button><br>
	</div>
	<div id="abh" style="font-size:20px;">
		<div id="popup-container">
			<a id="close"  href="javascript:void(0);" onclick="removebackground();"><span>[x] Close</span></a>
			<div id="pop_up"></div>
		</div>
</div>
	
	</div>


	<br>
    <br>

<?php
ob_start();
include "config.php";
include_once('session.php');

if (isset($_SESSION['username']) and isset($_SESSION['email']))
{
    $uname = $_SESSION['username'];
	$email=$_SESSION['email'];
    //echo "<span style=\"color:#AFA;text-align:center;\"><h3>Welcome $uname</h3></span>";
    $result=mysql_query("SELECT 
	t.dt AS `date` , t.likes AS likes, t.entry AS entry, t.topic AS topic, t.uname AS uname,t.email as email,COUNT( `comment` ) AS comment_no
FROM thinktank AS t
LEFT OUTER JOIN comments AS c ON t.email = c.uemail
AND t.topic = c.topic
WHERE t.email='$email'
GROUP BY t.topic, t.email
ORDER BY (
t.dt - NOW( )
) /10000 + COUNT( `comment` ) * t.likes DESC"/* where uname<>'$uname'" /*and check the date*/);


    if (mysql_num_rows($result)>0)
    {
        while($rows=mysql_fetch_array($result))
        {
            
                $wemail = str_replace(" ", "^%", $rows['email']);
	            $topic = str_replace(" ", "^%", $rows['topic']);
			?><center><div class=roundedCorner>	
                <?php echo $rows['uname']; ?>=>
                <b><?php echo $rows['topic'] ?><b/><br/>
                <span class="entry"><?php echo nl2br($rows['entry']); ?></span><br/><br/>
				
				<a href="#" onClick="show_coords(event);show_post('<?php echo $wemail."#".$topic; ?>');return false;" id="<?php echo $wemail."#".$topic; ?>">Comments</a>
				<span id="nu_<?php echo $wemail."#".$topic; ?>">(<?php echo $rows['comment_no'];?>)</span><span style="float:right;font-size:10px;"><?php echo $rows['date'];?></span>
				
				
				<div id="<?php echo $wemaill."|".$topic; ?>">Likes :<?php echo $rows['likes']; ?></div>
				</center><br /><?php
           
		}
    echo '</table>';
    }
    else
    {

        echo "you have not written anything...";

    }
}
else
{
    echo "<script>alert('You are not logged in. Please log in.')</script>";
    header("refresh: 0; url=http://www.aavartan.com");
}

//if (/**/TRUE)
//$sql="SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
//$result=mysql_query($sql);<?php
ob_end_flush();
?>
</div>

</html>
