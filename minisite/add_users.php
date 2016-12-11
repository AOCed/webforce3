<?php 
session_start();
require('../inc/connexion.inc.php');

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>S'inscrire</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<form action="./libs/inscription_users.php?action=inscription" method="post">
			<fieldset>
				<label for="signup">Inscrivez Vous</label>
				<input type="text" placeholder="votre name" name="userName" />
				<input type="text" placeholder="votre e-mail" name="userMail" />
				<input type="password" placeholder="votre mot de passe" name="userPwd">
				<a href="signup.php" id="signup">Je m'inscris</a>
			</fieldset>
		</form>

	</body>
</html>