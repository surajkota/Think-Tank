<?php
ob_start();
include "config.php";
include_once('session.php');
if (isset($_SESSION['username']) and isset($_SESSION['email']))
{
    $flag=$_POST["flag"];
    $topic=$_POST["topic"];
	$email=$_SESSION['email'];
    $wemail = $_POST["wemail"];
    //$uname = $_POST['uname'];
    $uname = $_SESSION['username'];

    
    
      

   if($flag==1)
	{
    mysql_query("insert into likes values('$topic','$email','$wemail')") or die();}
	else
    { mysql_query("delete from likes  where topic='$topic' and lbemail='$email'and wemail='$wemail' ") or die();
    }
    
  $likequery1 = mysql_query("SELECT * FROM `likes` WHERE topic = '$topic' and wemail='$wemail'");
    $likes = mysql_num_rows($likequery1);

    mysql_query("update thinktank set likes=$likes where email='$wemail' and topic='$topic'"/*and check the date*/)
    or die("sala thinktank");

    echo $likes;
	
}
else
{
    echo "<script>alert('You are not logged in. Please log in.')</script>";
    header("refresh: 0; url=http://www.aavartan.com");
}
ob_end_flush();
?>
