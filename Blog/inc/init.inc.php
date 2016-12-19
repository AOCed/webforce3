<?php 
	session_start();

	require_once('connection.inc.php');
	require_once('functions.inc.php');

	if(!empty($_COOKIE['user_id'])){
		$_SESSION['user'] = $_COOKIE['user_id'];
	}

?>