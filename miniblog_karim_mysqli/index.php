<?php
	require_once('inc/init_session.inc.php');
	// session_destroy();
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />		
		<title>Mini Blog</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<h1>Thwither</h1>
		
		<?php 
			// Pour chiffrer le mot de passe en mode md5 echo md5("nov");
			// Une autre facon de chiffrer le mot de passe en mode sha1 (conseillé que md5) echo sha1("nov");
			// En fonction de la version, ca marche que sur version récente, à vérifier : echo password_hash("nov", PASSWORD_BCRYPT);
			// je vérifie que l'utilisateur est connecté

			if (!empty($_SESSION['user'])) {
				// l'utilisateur est connecté
				echo '<p style="text-align:center;" id="listeProduit">';
				echo "Bonjour, ".$_SESSION['user']['users_firstname']." ! "; 
				echo "</p>";
				echo '<img src="content/media/1481543761.gif" />';
				?>
				<a href="libs/services.php?action=logout">Déconnexion</a><br>
				<form action="libs/services.php?action=addPost" method="post">
					<textarea name="message" maxlength="140" required="required" placeholder="max 140 caractères..."></textarea>
					<input type="submit" id="btnMsg" value="Envoyer Thwither" />
				 </form>

				<?php  
					// Récupération des messages précédents
					// $sql = "SELECT * FROM messages, users order by msg_date desc";
					// Avec natural Join
					$sql = "SELECT * FROM messages NATURAL JOIN users order by msg_date desc";

					$req = mysqli_query($connexion, $sql);

					// Tant qu'on peut mettre une nouvelle ligne de résultat dans la variable $datas, on continue la boucle
					if (mysqli_num_rows($req)!=0) {

						
						while ($datas = mysqli_fetch_assoc($req)) {
							?>
							<div>
								<p id="message"><?php echo $datas['msg_text']; ?></p>
								<p id="date">by <?php echo $datas['users_firstname']; ?> | </p><p id="date"><?php echo $datas['msg_date']?></p>
								<a href="libs/services.php?action=deletePost&target=<?php echo $datas['msg_id'];?>" id="supprPost">Supprimer</a>
							</div>					
							<?php
						}
					}
				} else {
				// Il n'y a pas d'utilisateur connecté
				?>
				<form action="libs/services.php?action=login" method="post">
					<label for="email">E-mail</label>
					<input type="email" name="mail" placeholder="Votre email" id="email" /><br>
					<label for="password">Mot de passe</label>
					<input type="password" name="password" placeholder="Votre mot de passe" id="password" />
					<input type="submit" value="Connecter" />
				</form>
				<?php
			} 	
		?>
		<footer><span>- copyright 2016 thwither -</span></footer>
	</body>
</html>


	</body>
</html>
