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
   <div id="cright1" style="float:right; width:60%;" > 
<?php 
include_once('session.php');
include "config.php";
if (isset($_SESSION['username']) and isset($_SESSION['email']))
{
    $uname = $_SESSION['username'];
    $email = $_SESSION['email'];
    $tpc=$_GET['tpc'];
    //echo "<h3>Welcome $uname</h3>";
    $result=mysql_query("SELECT 
	t.dt AS `date` , t.likes AS likes, t.entry AS entry, t.topic AS topic, t.uname AS uname, t.email as email ,COUNT( `comment` ) AS comment_no
FROM thinktank AS t
LEFT OUTER JOIN comments AS c ON t.email = c.uemail
AND t.topic = c.topic
WHERE t.email='$email' and t.topic=(select topic from topics where id=$tpc)
GROUP BY t.topic, t.email
ORDER BY (
t.dt - NOW( )
) /10000 + COUNT( `comment` ) * t.likes DESC"/* where uname<>'$uname'" /*and check the date*/);

    if (mysql_num_rows($result)>0)
    {
        while($rows=mysql_fetch_array($result))
        {
            	$wemail =  str_replace(" ", "^%", $rows['email']);
	         $topic = str_replace(" ", "^%", $rows['topic']);
                   			

?><center><div class=roundedCorner>	
               <b> <?php echo  $rows['uname']; ?></b>=>
                <b><?php echo $rows['topic'] ?><b/><br/>
                <span class="entry"><?php echo nl2br($rows['entry']); ?></span><br/><a href="#" onclick="show_coords(event); show_post('<?php echo $wemail."#".$topic; ?>'); return false;" id="<?php echo $wemail."#".$topic; ?>">Comments</a><span id="nu_<?php echo $wemail."#".$topic; ?>">(<?php echo $rows['comment_no'];?>)</span><span style="float:right;font-size:10px;"><?php echo $rows['date'];?></span><br/>Likes : <?php echo $rows['likes'];?></div></center><br /><?php
        }
    }
    else
    {
        $result=mysql_query("select id,topic from topics where id=$tpc" /*and check the date*/);
            $rows=mysql_fetch_array($result);
            echo "You have not written anything...
            <br/> Topic is: <strong>".$rows['topic']."</strong>(maximim <b>500</b> characters)";
            echo "<form id='login' action='insert.php?tpc=".$rows['id']."' method='post' accept-charset='UTF-8' >
                <textarea name='entry' rows=7 cols=85 id='textarea' onKeyDown=\"if (this.value.length > 500) {	this.value = this.value.substring(0, 499);};\" onKeyUp=\"if (this.value.length > 500) {	this.value = this.value.substring(0, 500);};\"></textarea>
                <input type='submit' name='submit' value='submit'/>
                </form>";
		
    }


    //echo "<br /><br />What others have written:<br />";
    $res=mysql_query("SELECT 
	t.dt AS `date` , t.likes AS likes,t.email AS email, t.entry AS entry, t.topic AS topic, t.uname AS uname,COUNT( l.lbemail ) AS mylike,COUNT( `comment` ) AS comment_no
FROM thinktank AS t
LEFT OUTER JOIN comments AS c ON t.email = c.uemail
AND t.topic = c.topic
LEFT OUTER JOIN likes AS l ON t.email = l.wemail
AND t.topic = l.topic
AND l.lbemail = '$email'
WHERE t.email<>'$email' and t.topic=(select topic from topics where id=$tpc)
GROUP BY t.topic, t.email
ORDER BY (
t.dt - NOW( )
) /10000 + COUNT( `comment` ) * t.likes DESC"/* where uname<>'$uname'" /*and check the date*/);
$i = 1;
    while($rws=mysql_fetch_array($res))
    {
		 $topic=$rws['topic'];
	    $wemail=$rws['email'];
          //  $wemail = str_replace(" ", "^%", $rws['email']);
          //  $topic = str_replace(" ", "^%", $rws['topic']);
		
	   
	 $likequery = mysql_query("SELECT * FROM `likes` WHERE topic = '$topic' and wemail='$wemail'");
	 $num_like = mysql_num_rows($likequery);
	    

            ?><center><div class=roundedCorner>	
                <b><?php echo $rws['uname']; ?></b>&nbsp;=>&nbsp;
                <b><?php echo $rws['topic'] ?><b/><br/><br />
                <span class="entry"><?php echo nl2br($rws['entry']); ?></span><br/><a href="#" onclick="show_coords(event);show_post('<?php echo $wemail."#".$topic; ?>'); return false;" id="<?php echo $wemail."#".$topic; ?>">Comments</a><span id="nu_<?php echo $wemail."#".$topic; ?>">(<?php echo $rws['comment_no'];?>)</span><span style="float:right;font-size:10px;"><?php echo $rws['date'];?></span>
                <div id="<?php echo $wemail."|".$topic; ?>">Likes :<?php echo $num_like; ?></div>
        
		
	
					<?php 
		$res1=mysql_query("SELECT * from likes where topic='$topic' and lbemail='$email'and wemail='$wemail'");

					if(mysql_num_rows($res1)==0)
					{
					
						?>
						<div onclick="var r=confirm('Are you sure you want to LIKE?');if (r==true){show('<?php echo $wemail."|".$topic; ?>',1);}">
				    <a id="l_<?php echo $wemail."|".$topic; ?>" href="javascript:timedrefresh(100);" style="text-decoration:none;color:#000;"> 
								<img src="../images/like.png" style="height:50px; padding-top:10px;" />
							</a>
						</div>
						<?php
					}
					else
					{
						?>
						<div onclick="var x;var r=confirm('Are you sure you want to UNLIKE?');if (r==true){show('<?php echo $wemail."|".$topic; ?>',0);}">
				<a id="l_<?php echo $wemail."|".$topic; ?>" href="javascript:timedrefresh(100);" style="text-decoration:none;color:#000;"> 
								<img src="../images/close.png" style="height:50px; padding-top:10px;" />
							</a>
						<?php
					}
					?>
                </p></div></center><br/><br/>
				
                    </div><br/><br/>
</div>		
		<?php
        
        $i++;
    }
            
            
}
else
{
    echo "<script>alert('You are not logged in. Please log in.')</script>";
    header("refresh: 0; url=http://www.aavartan.in");
}



//if (/**/TRUE)
//$sql="SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
//$result=mysql_query($sql);
?>
</div>
<script>
function timedrefresh(timeout)
{setTimeout("location.reload(true);",timeout);
}
</script>
<!--<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<input type='text' name='uname'  maxlength="50" />
<input type='password' name='pwd' maxlength="50" />
<input type='submit' name='Submit' value='Submit' />
</form>-->
</body>
<style type="text/css">

</style>

<!--<script type="text/javascript" src="think.js"></script>
<?php
ob_end_flush();
?>
