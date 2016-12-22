<?php
session_start();
	require('../inc/connection.inc.php');

	if (isset($_GET['action']) && $_GET['action']!="") {
		switch($_GET['action']) {
			case 'add':
				add();
			break;
			case 'modify':
				modify();
			break;
			case 'sort':
				sort();
			break;
		

			default: break;
		}
	} else {		
		header('Location: ../index.php');
	}

	function add() {
		global $connection;

		if (!empty($_POST['title']) && (!empty($_POST['director']) || !empty($_POST['story']) || !empty($_POST['actors']) || !empty($_POST['genre']) || !empty($_POST['year'])))  {

			$datas = array(
				"title" => $_POST['title'],
				"story" => $_POST['story'],
				"director" => $_POST['director'],
				"actors" => $_POST['actors'],
				"genre" => $_POST['genre'],
				"year" => $_POST['year']
				);

			$sql = "INSERT INTO list (dvd_title, dvd_story, dvd_director, dvd_actors, dvd_genre, dvd_year) VALUES(:title, :story, :director, :actors, :genre, :year)";
			$req = $connection->prepare($sql);
			$req->execute($datas);

			header('Location: ../index.php');

		}
	}

	function modify() {
		global $connection;

		if (trim($_POST['title'])!="" || trim($_POST['story'])!="" || trim($_POST['director']) !="" || trim($_POST['actors'])!="" || trim($_POST['year']) !="") {

			$datas = array(
				"title" => $_POST['title'],
				"story" => $_POST['story'],
				"director" => $_POST['director'],
				"actors" => $_POST['actors'],
				"genre" => $_POST['genre'],
				"year" => $_POST['year'],
				"id" => $_POST['id']
				);

			$sql = "UPDATE list SET dvd_title=:title, dvd_story=:story, dvd_director=:director, dvd_actors=:actors, dvd_genre=:genre, dvd_year=:year WHERE dvd_id=:id";
			$req = $connection->prepare($sql);
			$req->execute($datas);

			header('Location: ../index.php?page=8');
		}
	}

/*	function sort() {
		global $connection;
		$sql = "SELECT * FROM `list` ORDER BY `list`.`dvd_title` ASC";
		$req = $connection->query($sql);
		req->execute();
		
		header('Location: ../index.php?page=2');
	}
*/
?>