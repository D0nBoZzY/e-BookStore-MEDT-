<?php
//start session
session_start();

//just simple session reset on logout click
if($_GET["reset"]==1)
{
	session_destroy();
	header('Location: ./register.php');
}

// Include config file and twitter PHP Library by Abraham Williams (abraham@abrah.am)
include_once("twitter/config.php");
include_once("twitter/inc/twitteroauth.php");

if(isset($_SESSION['status']) && $_SESSION['status']=='verified') 
{	echo '<a href="register.php?reset=1">Logout</a>!</div>';	
}else{
	//login button
	echo '<a href="twitter/process.php"><img src="twitter.png"></img></a>';
}

?>

