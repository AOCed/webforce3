<?php 
	require_once('../inc/init.inc.php');
	// include('inc/list.inc.php');


	if (empty($_SESSION['user']) || $_SESSION['admin'] == 0) {
		header('Location: ../?page=login');
		die();
		# code...
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Backoffice</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<?php
			include('../inc/header.inc.php');

			if(!empty($_GET['page']) && file_exists('inc/'.$_GET['page'].'.inc.php')) {
					include('inc/'.$_GET['page'].'.inc.php');
			} else {
				include('inc/list.inc.php');
			}
		?>
	</body>
</html>