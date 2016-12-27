<?php 
session_start();

// Refaire la session;
if(!empty($_GET['reset']) && $_GET['reset']=='true') { session_unset();}


// Vérifier si une lettre est saisie

if (!empty($_POST['letter'])) {
	// Definir le mot à trouver et transformer en tableau
	$_SESSION['word'] = "elephant";

	// Préparer l'affichage des lettres 
	if(!empty($_SESSION['guess'])) {
			echo $_SESSION['guess'];
		for ($i=0; $i < strlen($_SESSION['word']); $i++) { 
			
			echo $_SESSION['guess'][$i] = " _ ";
		
		}
	}

	/*	$_SESSION['lettres'] .= $_POST['letter']; 

		echo "<br />Vos lettre utilisées : ".$_SESSION['lettres'];*/


}


/*	if(!empty($_POST['letter'])) {

		$tryLetter = $_POST['letter'];

		for ($i=0; $i < count($word_array); $i++) { 

			if ($word_array[$i] == $tryLetter) {

				$mask[$i] = $tryLetter;

			} else {

			}
		} 

	}
*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Le Pendu</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Hangman</h1>
	<p> <?php  ?>
	</p>
	<form action="test3.php" method="post">
		<input type="text" name="letter" size="3" maxlength="1">
		<input type="submit" value="Guess">
	</form>
	<a href="test3.php?reset=true">Recommencer</a>
</body>
</html>