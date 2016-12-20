<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<form action="libs/services.php?action=modifScore" method="post">
	
	<label for="student">Nom d'élève</label>
	<select name="student">
		<option value="1">Thomas Mion </option>
		<option value="2">Andrei Gache</option>
		<option value="3">Thibaud Molitor</option>
		<option value="4">Eramban</option>
	</select>

	<label for="subject">Matière</label>
	<select name="subject">
		<option value="1">html </option>
		<option value="2">css</option>
		<option value="3">javascript</option>
		<option value="4">php</option>
		<option value="5">mysql</option>
	</select>

	<label for="score">Note</label>
	<input type="text" name="score" />

	<input type="submit" value="envoyer">

	<a href="index.php">Retour sur Bulletin</a>

</form>
	
</body>
</html>