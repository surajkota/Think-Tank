<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 *  uname 	varchar(30) 	No
    topic 	varchar(30) 	Yes 	NULL
    entry 	varchar(500) 	Yes 	NULL
    likes 	int(11) 	Yes 	NULL
 *
 *
 *
 */
/*
$host = "technocracynitrrcom.ipagemysql.com";
$user = "event_think";
$pwd = "Thinktank123";
$con = mysql_connect($host, $user, $pwd);
*/
$host = "localhost";
$user = "root";
$pwd = "";
$con = mysql_connect($host, $user, $pwd);
/*
$host = "Host here";
$user = "prankur";
$pwd = "prankur!@";
$con = mysql_connect($host, $user, $pwd);*/
mysql_select_db("thinktank1", $con) or die("Opps some thing went wrong");
?>
