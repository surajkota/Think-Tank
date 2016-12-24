<?php
ob_start();
include_once('session.php');
?>
<?php 
ob_start();
include_once('session.php');
include "config.php";
?>

<?php

echo "<table style=\"float:center; width:100%; padding:10px 10px 10px 10px;\" border=\"0\" align=\"center\" cellpadding=\"6\" cellspacing=\"1\" >
	 <tr class='thead'>
          <th>Rank</th>
          <th>User</th>
          <th>No. of Likes</th>
          </tr>";

?>		  
<?php	
ob_start();
include "config.php";
$result=mysql_query("SELECT uname,email , sum(likes) as net_like from thinktank group by email order by net_like desc LIMIT 0 , 10");
$i = 1;
if (mysql_num_rows($result)>0)
    {   
while($rws=mysql_fetch_array($result))
    {
	echo "<tr class='tmain'>
	<td>".$i."</td>
	<td>".strtoupper($rws['uname'])."</td>
	<td>".$rws['net_like']."</td></tr>";
	//echo $i.$rws['uname'].$rws['net_like'];
	$i++;
    }}?>
<?php echo "</table>"; ?>
		
<?php ob_end_flush(); ?>
