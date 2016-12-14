<?php 
session_start();
$annee = (isset($_SESSION['annee'])) ? $_SESSION['annee'] : '';
$long = (isset($_SESSION['longueur'])) ? $_SESSION['longueur'] : '';
$lar = (isset($_SESSION['largeur'])) ? $_SESSION['largeur'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signe Zodiaque html</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Les Exercices</h1>
	<form action="./traitement.php?action=calculeSigne" method="post">
		<label for="signeChinois">Votre signe zodiaque chinois</label>
		<input type="text" placeholder="Saisissez une année" id="anneeSaisie" name="anneeSaisie" maxlength="4" 
		value="<?php echo $annee; ?>" />
		<input type="submit" value="Trouve votre signe!">
	</form>
	<?php
		echo '<p>';
	// if (!empty($_GET['res'])) echo $_GET['res'];
	if (!empty($_SESSION['resultat'])) echo $_SESSION['resultat'];
	echo "</p>";
	unset($_SESSION['resultat']);
	unset($_SESSION['annee']);
	// Pour supprimer les résultats de la session 'resultat'
	//session_unset();
	?>

	<form action="./traitement.php?action=calculeAire" method="post">
		<label for="aireRectangle">Calculez l'aire d'un rectangle</label>
		<input type="text" placeholder="Saisissez un longueur" name="larSaisie" id="lon" value="<?php echo $long; ?>" />
		<input type="text" placeholder="Saisissez un largeur" name="lonSaisie" id="lar" value="<?php echo $lar; ?>"/>
		<input type="submit" value="Trouve l'aire!">
	</form>

	<?php 		
	// var_dump($_GET); equivalent à console.log() en javascript
		echo '<p>';
	if (!empty($_SESSION['resultat2'])) echo $_SESSION['resultat2'];
		echo '<p>';

		unset($_SESSION['resultat2']);
		unset($_SESSION['largeur']);
		unset($_SESSION['longueur']);
	?>


	<form action="./traitement.php?action=displayPost" method="post">
		<input type="hidden" value="caché" name="champCache" />
		<input type="password" value="" name="mdp" />
		<input type="text" value="" name="unTexte" />
		<input type="text" value="lecteur seule" name="unDeuxiemeTexte" readonly="readonly" />
		<br>
		<select name="pays" >
			<option value="1" selected="selected">France</option>
			<option value="2">Espagne</option>
			<option value="3">Benelux</option>
			<option value="4">Italie</option>
		</select>
		<br>
		<br>
		<select name="metier[]" multiple="multiple" >
			<option value="1" selected="selected">medecin</option>
			<option value="2">developpeur</option>
			<option value="3">eboueur</option>
			<option value="4">gardien</option>
		</select>
		<br>
		<input type="checkbox" value="check1" name="mesCheckbox[]" checked="checked" />check1<br>
		<input type="checkbox" value="check2" name="mesCheckbox[]" />check2<br>
		<input type="checkbox" value="check3" name="mesCheckbox[]" />check3<br>
		<br>
		<input type="radio" name="genre" value="homme" checked="checked" />Homme<br>
		<input type="radio" name="genre" value="femme" />Femme<br>
		<input type="radio" name="genre" value="autre" />Autre<br>
		<br>
		<input type="radio" name="couleur" value="rouge" />Rouge<br>
		<input type="radio" name="couleur" value="vert" />Vert<br>
		<input type="radio" name="couleur" value="bleu" />Bleu<br>
		<br>
		<input type="submit" value="c'est parti !" />
	</form>

	<form action="./traitement.php?action=bissextile" method="post">
		<label for="bissextile">Année bissextile ?</label>
		<input type="text" name="anneeBis" placeholder="Saississez une anneée.">
		<input type="submit" value="Saississez une année">
	</form>

	<?php 		
		echo '<p>';
		if (!empty($_SESSION['resultat3'])) echo $_SESSION['resultat3'];
		echo '<p>';

		unset($_SESSION['resultat3']);
		unset($_SESSION['bis']);

	?>

</body>
</html>