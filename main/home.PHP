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


<body onload="leaderboard();">
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
    <br>
	
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
  

<div id="cright1" style="float:right; width:60%;" >


<?php 
include_once('session.php');
include "config.php";


function is_entry($topic,$uname)
{
	$result=mysql_query("select * from thinktank where uname='$uname' and topic='$topic'" /*and check the date*/);
	if(mysql_num_rows($result)>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}


if (isset($_SESSION['username']) and isset($_SESSION['email']))
{
    $uname = $_SESSION['username'];
    $email = $_SESSION['email'];
    
    echo "<span style=\"color:#AFA;text-align:center;\"><h3>Welcome $uname</h3></span>";
	date_default_timezone_set('Asia/Kolkata'); 
	$d=date('j');
	//echo $d;
       echo "<br/><br/><span style=\"color:#AFA;\">What others have written :</span><br />";
    
	$res=mysql_query("SELECT 
	t.dt AS `date` , t.likes AS likes,t.email AS email, t.entry AS entry, t.topic AS topic, t.uname AS uname,COUNT( `comment` ) AS comment_no
FROM thinktank AS t
LEFT OUTER JOIN comments AS c ON t.email = c.uemail
AND t.topic = c.topic
WHERE t.email<>'$email'
GROUP BY t.topic, t.email
ORDER BY (
t.dt - NOW( )
) /10000 + COUNT( `comment` ) * t.likes DESC"/* where uname<>'$uname'" /*and check the date*/);



$i = 1;
$index=0;


// writing all the comments done by users with like / unlike image


    while($rws=mysql_fetch_array($res))
    {
	    $index++;
            $topic=$rws['topic'];
	    $wemaill=$rws['email'];
		$entry=$rws['entry'];
            $un =str_replace(" ", "^%", $rws['email']);
            $tp =str_replace(" ", "^%", $rws['topic']);
		
	   
	    $likequery = mysql_query("SELECT * FROM `likes` WHERE topic = '$topic' and wemail='$wemaill'");
	 
            $num_like = mysql_num_rows($likequery);
	    
            ?>
               <center><div id="roundcr" class=roundedCorner>
	
               <p align = "left" > <span style="color:#AFA;"><?php echo $rws['uname']; ?></span>

               <b><?php echo $rws['topic'] ?><b/><br/>

                <span class="entry"><?php echo nl2br($rws['entry']); ?>
		</span><br/><br>
		
		
		<a href="#" onclick="show_coords(event);show_post('<?php echo $wemaill."#".$topic; ?>'); return false;" id="<?php echo $wemaill."#".$topic; ?>">Comments</a><span id="nu_<?php echo $wemaill."#".$topic; ?>">(<?php echo $rws['comment_no'];?>)</span><span style="float:right;font-size:10px;"><?php echo $rws['date'];?></span>

		
		<div id="<?php echo $wemaill."|".$topic; ?>">Likes :<?php echo $num_like ; ?></div>
                
					<?php 

	$res1=mysql_query("SELECT * from likes where topic='$topic' and lbemail='$email'and wemail='$wemaill'");

					if(mysql_num_rows($res1)==0)
					{
					
						?>
						<div onclick="var r=confirm('Are you sure you want to LIKE?');if (r==true){show('<?php echo $wemaill."|".$topic; ?>',1);}">
				    <a id="l_<?php echo $wemaill."|".$topic; ?>" href="javascript:timedrefresh(100);" style="text-decoration:none;color:#000;"> 
								<img src="../images/like.png"  class=like />
							</a>
						</div>
						<?php
					}
					else
					{
						?>
						<div onclick="var x;var r=confirm('Are you sure you want to UNLIKE?');if (r==true){show('<?php echo $wemaill."|".$topic; ?>',0);}">
				<a id="l_<?php echo $wemaill."|".$topic; ?>" href="javascript:timedrefresh(100);" style="text-decoration:none;color:#000;"> 
								<img src="../images/close.png" class=like />
							</a>
						<?php
					}
					?>
                </p></div></center><br/><br/>
				
                    </div><br/><br/>
				<?php
        
        $i++;
    }
            
}
else
{
    echo "<script>alert('You are not logged in. Please log in.')</script>";
   header("refresh: 0; url=http://www.aavartan.in");
}


?>

	

</div>
</div>
    <script>
function timedrefresh(timeout)
{setTimeout("location.reload(true);",timeout);
}
</script>

</body>
<style type="text/css">



</style>
<?php
ob_end_flush();
?>
