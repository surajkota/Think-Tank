<?php
ob_start();
include_once('session.php');
include_once('config.php');
function load_comments($topic,$wemail)
{
	$result=mysql_query("SELECT c.uname as 'uname', c.comment as 'comment',c.dt as 'dt'
FROM comments AS c
WHERE c.topic = '$topic'
and c.uemail='$wemail'" );

    while($rws=mysql_fetch_array($result))
	{
	$comment=$rws['comment'];
	$uname=$rws['uname'];
    $dt = $rws['dt'];
		?>
		<div class="comment">
			<span>
			<?php echo "$comment";?><br />
			<p style="float:left;font-size:10px;"><?php echo "$uname"; ?></p>
			<p style="float:right;font-size:10px;"><?php echo "$dt"; ?></p>
			</span>
			<hr style="clear:both;color:brown;" />
		</div>
		<?php
	}
	?>
	<?php
}
?>
<?php 
if(isset($_SESSION['username']) and isset($_SESSION['email']))
{
	$uname=$_SESSION['username'];
$email=$_SESSION['email'];
	$topic=$_POST['topic'];
    $wemail = $_POST['wemail'];
    //$uname = $_SESSION['username'];
    $result=mysql_query("select * from thinktank where email='$wemail' and topic='$topic'" /*and check the date*/);
    $rws=mysql_fetch_array($result);
	$topic=$rws['topic'];
	$entry=$rws['entry'];
    $likes = $rws['likes'];
    ?>
	<strong><?php echo $topic;?></strong><br />
	<p class="entry1"><?php echo $entry;?></p>
	<!-- Show comments HERE-->
	<!-- Here a textt box for comment and insert input using ajax post only-->
	<h5>Comments:</h5>
	<div id="comment_box">
	<?php
		load_comments($topic,$wemail);
	?>
	</div>
	<input type="text" name="comment" id="user_comment"/>
	<input type="submit" onclick="comment3(this)" id="<?php echo $wemail."~".$topic; ?>" value="Comment"/>
	<div id="status"></div>
	<?php
}
else
{
	echo "Not Logged in";
}
?>
<?php ob_end_flush(); ?>
