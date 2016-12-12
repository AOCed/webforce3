<?php 
	require_once('./inc/init_session.inc.php');
	// session_destroy(); Le temps qu'on crée le bouton de déconnexion, on déclare. Après on efface.
 ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title> <?php echo SITE_NAME; ?> </title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<main>
			<h1>TWITTER</h1>
			<article>
				<img src="content/media/1481543761.gif" alt="profil photo">
				<?php 
				if (!empty($_SESSION['user'])) {
				echo '<span style="text-align:center;" >';
				echo "Bonjour, ".$_SESSION['user']['firstname']." "; 
				echo "</span>";
					?>
					<a href="libs/services.php?action=logout">Déconnexion</a>
					<?php			
				} else {
					// Il n'y a pas d'utilisateur connecté
					?>
					<!-- Formulaire de connexion -->
					<h2>Connectez Vous</h2>
					<form action="libs/services.php?action=login" method="post">
						<label for="email">Email</label>
						<input type="text" placeholder="votre e-mail" name="userMail" />
						<label for="password">Mot de passe</label>
						<input type="password" placeholder="votre mot de passe" name="userPwd">
						<input type="submit" value="Log In">
					</form>
					<?php 
				}
				?>
				<form action="add_modif_messages.php?" name="miniBlog" method="post">
					<label for="blog">Mini Blog</label>
					<textarea name="message">140 caractères...</textarea>
					<input type="submit" value="écrire">
				</form>
			</article>
		</main>

		<article>
			<?php  
				$sql = "SELECT * FROM messages";
				$req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

				// Tant qu'on peut mettre une nouvelle ligne de résultat dans la variable $datas, on continue la boucle
				while ($datas = mysqli_fetch_assoc($req)) {
					echo "<tr>";
					echo "<td>".$datas['msg_firstname']."</td>";
					echo "<td>".$datas['msg_text']."</td>";
					echo "<td>".$datas['msg_date']."</td>";
					echo "<td><img width=\"100\" src=\"".$datas['pr_image']."\" /></td>";


					if(isset($_SESSION['user'])) {
						echo "<td><a href='add_modify_products.php?id=".$datas['msg_id']."' id='modifProduit'>Modifier</a></td>";
					}
					if(isset($_SESSION['user'])) {
						echo "<td><a href='libs/services_products.php?action=delete&id=".$datas['msg_id']."' id='supprProduit'>Supprimer</a></td>";
					}
				echo "</tr>";
				}
			?>
		</article>


	</body>
</html>
