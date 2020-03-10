<?php

	echo "you have successfully logged out";
	
	$_SESSION["User"] = "Invalid";
	$_SESSION["NamePass"] = "";

	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy(); 
	
	header('Location: http://kmoonpage.com/Prototypes/StudentLogin.php');
?>