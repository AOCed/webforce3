<?php 
	require_once('inc/init.inc.php');


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Blog</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
		<?php include('inc/header.inc.php'); ?>

		<?php // Appeler la vue correspondant à la page demandée 
			if(!empty($_GET['page'])){

				// Pour faire dynamique, au lieu de faire Switch, on utilise variable dans Include et faudra utiliser le meme nom du fichier 
				if (file_exists('inc/'.$_GET['page'].'.inc.php')){
					include('inc/'.$_GET['page'].'.inc.php');
				} else {
					include('inc/404.inc.php');
				}
				/*switch($_GET['page']){
					case 'home':
					break;
						include('inc/home.inc.php');
					case 'blog':
						include('inc/blog.inc.php');
					break;
					default:
						// La page existe mais corréspond pas à un lien => 404
						include('inc/404.inc.php');
					break;
				}*/
			} else {
				include('inc/home.inc.php');
			}
		?>

		<?php include('inc/footer.inc.php'); ?>
	</body>
</html>