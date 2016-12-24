<?php
ob_start();
include_once('session.php');
include_once('config.php');
function is_entry($topic,$email)
{	
	$result=mysql_query("select * from thinktank where email='$email' and topic='$topic'" /*and check the date*/);
	if(mysql_num_rows($result)>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function insert_comment($comment,$t_wemail,$c_wemail,$topic,$c_uname)
{
	//echo $t_writer."<br />";
	//echo $topic."<br />";
	//echo $comment."<br />";
	//echo $c_writer."<br />";
	date_default_timezone_set ( 'Asia/Kolkata' );
	$dt = date('Y-m-d H:i:s');
	$result=mysql_query("insert into comments values('$comment','$topic','$t_wemail','$c_wemail','$c_uname','$dt')");
	return $result;
}
?>
<?php 
if(isset($_SESSION['username']) and isset($_SESSION['email']))
{
	$c_uname=$_SESSION['username'];
	$c_wemail=$_SESSION['email'];
	$topic=$_POST["topic"];
	$comment=$_POST['comment'];
    $t_wemail = $_POST["wemail"];
    if(is_entry($topic,$t_wemail))
	{
		if(insert_comment($comment,$t_wemail,$c_wemail,$topic,$c_uname))
		{
			echo "Inserted";
			return true;
		}
		else
		{
			echo "Failed to insert comment";
		}
	}
	else
	{
		echo "You seem to have stucked in the wrong way";
	}
    ?>
	<?php
	
}
else
{
	echo "Not Logged in";
}
?>
<?php ob_end_flush(); ?>
