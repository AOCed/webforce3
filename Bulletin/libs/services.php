<?php 

	session_start();
	require('../inc/connection.inc.php');

	if (isset($_GET['action']) && $_GET['action']!="") {
		switch($_GET['action']) {
			case 'addStudent':
				addStudent();
			break;
			case 'addSubject':
				addSubject();
			break;
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

	function addStudent(){
		global $connection;

		if(!empty($_POST['student'])){

			$data = array("student" => $_POST['student']);

			$sql = "INSERT INTO `students` (`stu_fullname`) VALUES (:student)";	
			$req = $connection->prepare($sql);
			$req->execute($data);
			header('Location: ../index.php');
		}
	}

	function addSubject(){
		global $connection;

		if(!empty($_POST['subject'])){
			$data = array("subject" => $_POST['subject']);

			$sql = "SELECT sub_name FROM subjects  WHERE sub_name =:name";
			$req = $connection->prepare($sql);
			$req->execute($data);

			// Vérification : On ajoute uniquement quand le nom de matière existe pas dans la BDD
			if ($req->rowCount()==0){
				$sql = "INSERT INTO `subjects` (`sub_name`) VALUES (:subject)";	
				$req = $connection->prepare($sql);
				$req->execute($data);
			}

			header('Location: ../index.php');
		}
	}

	function addScore(){
		global $connection;

/*		var_dump($_POST);
		die();
*/
		if(!empty($_POST['students']) && !empty($_POST['subjects']) && !empty($_POST['score'])) {
			$data = array(
					"student" => $_POST['students'],
					"subject" => $_POST['subjects'],
					"score" =>  $_POST['score']);		

			$sql = "INSERT INTO `scores` (`sub_id`, `stu_id`, `score`) VALUES (:subject, :student, :score)";
			$req = $connection->prepare($sql);
			$req->execute($data);

			header('Location: ../index.php');
		} 
	}

	function modifScore(){
		global $connection;


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