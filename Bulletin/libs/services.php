<?php 

	session_start();
	require('../inc/connection.inc.php');

	if (isset($_GET['action']) && $_GET['action']!="") {
		switch($_GET['action']) {
			case 'addScore':
				addScore();
			break;
			case 'modifScore':
				modifScore();
			break;		

			default: break;
		}
	} else {
		
		header('Location: ../index.php');
	}

	function addScore(){
		global $connection;

		if(!empty($_POST['student']) && !empty($_POST['subject']) && !empty($_POST['score'])) {
			$data = array(
					"student" => $_POST['student'],
					"subject" => $_POST['subject'],
					"score" =>  $_POST['score']);		

			$sql = "INSERT INTO `scores` (`sub_id`, `stu_id`, `score`) VALUES (:subject, :student, :score)";
			$req = $connection->prepare($sql);
			$req->execute($data);

			header('Location: ../index.php');
		} 
	}

	function modifScore(){
		global $connection;

		var_dump($_POST);
		die();

		if(!empty($_POST['student']) && !empty($_POST['subject']) && !empty($_POST['score'])){

			$data = array(
				"student"=>$_POST['student'],
				"subject"=>$_POST['subject'],
				"score"=>$_POST['score']
				);

			$sql = "UPDATE scores SET stu_id=:student, sub_id=:subject, score=:score WHERE stu_id=:student AND sub_id=:subject"; 
			$req = $connection->prepare($sql);
			$req->execute($data);

			header('Location: ../index.php');
			exit();
		}
	}


?>