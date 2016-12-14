<?php 
require_once('inc/connexion.inc.php');
require_once('inc/functions.inc.php');

$id_page_accueil = 1;
// Récupérer l'id page à afficher s'il a été passé en paramètre GET
if(isset($_GET['page'])){
	$_ENV['page'] = intval($_GET['page']);
} else {
	$_ENV['page'] = $id_page_accueil;
}
// Récupérer les infos de la page
extractInfoPage();


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?php echo $_ENV['title'];?></title>
		<meta name="description" content="<?php echo $_ENV['description'];?>">
		<meta name="keywords" lang="fr" content="<?php echo $_ENV['keywords'];?>">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div id="menu_horizontal">
			<?php 
				// Affiche le menu de la page d'accueil
				echo displayMenu($id_page_accueil);
			?>
		</div>
		<div id="chemin_fer">
			<?php 
				// Affiche le chemin pour arriver à cette page
				echo '<p style=text-align:center>Vous etes ici </p>'.displayPath($_ENV['page']);
			?>
		</div>
		<div id="content">
			<div id="menu">
				<?php 
					// Affiche les sous menus de notre page
					echo displayMenu($_ENV['page']);
				?>
			</div>
			<div id="subContent">
				<?php 
					echo $_ENV['content'];
				?>
			</div>
		</div>
		<footer>
			copyright 2016
		</footer>
	</body>
</html>
