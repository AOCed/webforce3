<?php 
require_once('./inc/init_session.inc.php');
unset($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title> <?php echo SITE_NAME; ?> </title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<form action="./libs/services_users.php?action=verifConnect" method="post">
			<fieldset>
				<label for="login">Connectez Vous</label>
				<input type="text" placeholder="votre e-mail" name="userMail" />
				<input type="password" placeholder="votre mot de passe" name="userPwd">
				<input type="submit" value="Log In">
				<a href="add_users.php">Sign Up</a>
			</fieldset>
		</form>
	</body>
</html>