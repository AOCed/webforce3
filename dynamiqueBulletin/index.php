<?php
include_once('inc/connexion.inc.php');
include_once('inc/functions.inc.php');

$id_page_accueil = 1;
// on récupère l'id page à afficher si il a été passé en paramètre GET
if(isset($_GET['page'])){
	$_ENV['page'] = intval($_GET['page']);
} else {
	$_ENV['page'] = $id_page_accueil;
}
// on va récupérer les infos de la page
extractInfoPage();
//print_r($_ENV);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <META NAME="keywords" lang="fr" CONTENT="<?php echo $_ENV['keywords']; ?>">
  <META NAME="description" CONTENT="<?php echo $_ENV['description']; ?>">
  <title><?php echo $_ENV['title']; ?></title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="menu_horizontal">
		<?php
			// affiche le menu de la page d'accueil
			echo displayMenu($id_page_accueil);
		?>
	</div>
	<div id="chemin_fer">
		<?php
			// affiche le chemin pour arriver à cette page
			echo 'Vous êtes ici '.displayPath($_ENV['page']);
		?>
	</div>
	<div id="content">
		<div id="menu">
			<?php
			// affiche les sous-menus de notre page
				echo displayMenu($_ENV['page']);
			?>
		</div>
		<div id="contenu">
			<?php
				// inclusion du contenu de la page si possible
				if(is_file('inc/'.$_ENV['content'].'.inc.php')) include('inc/'.$_ENV['content'].'.inc.php');
			?>
		</div>
	</div>
</body>
</html>