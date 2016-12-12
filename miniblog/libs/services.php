<?php 
	require('../inc/init_session.inc.php');

	if (!empty($_GET['action'])){
		switch($_GET['action']) {
		case 'login':
			login();
		break;
		case 'logout':
			session_destroy();
		break;

		default: break;
	}

	header ('Location: ../index.php');
	die();



	function login(){

	}

?>