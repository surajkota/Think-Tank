<?php
  if (!isset($_SESSION))
  {
    session_start();
	$_SESSION['email']='suraj@xyz.in';
	$_SESSION['username']='Suraj';
	

	
	/*$pos=strpos($_SESSION['email'],"@");
	$_SESSION['username']=substr($_SESSION['email'],0,$pos);*/

		/*$_SESSION['email']=$user['email'];;
	$_SESSION['username']=$user['firstname'];*/
  }
?>
