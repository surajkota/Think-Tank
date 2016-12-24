<?php
ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../stylesheet/table.css" />
        <title></title>
    </head>
    <body>
        <?php
        ob_start();
        include "config.php";
        include_once('session.php');
        if (isset($_SESSION['username']))
        {
            $uname = $_SESSION['username'];
            echo "<h1>Welcome $uname</h1>";
            $result=mysql_query("select * from topics");
            if (mysql_num_rows($result)>0)
            {
               while($rws=mysql_fetch_array($result))
                {
                    
                        echo "<center><div class=roundedCorner onclick=xyz('".$rws['topic']."')><a href='topic1.php?tpc=".$rws['id']."'style=text-decoration:none;color:#000;>".$rws['topic']."</a><br/>Issued on : ".$rws['issued']." Feb"."
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
    </body>
<style type="text/css">
.roundedcorner
{
text-align:center;
border:2px solid #a1a1a1;
padding:10px 40px; 
background:lightblue;
width:20em;
border-radius:25px;
box-shadow: 5px 5px 5px #888888;
}
</style>
</html>
<?php
ob_end_flush();
?>
