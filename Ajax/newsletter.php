<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Newsletter</title>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<h1>AJAX</h1>
		<form class="newsletter ajax" action="libs/services.php" method="post">
			<label for="">Formulaire de newsletter</label>
			<input type="email" placeholder="Entrez votre e-mail adresse" name="email" required="required" />
			<input type="submit" value="Inscrire" />
			<input type="hidden" name="action" value="addNewsletter" />
			<div class="retour">
				<!-- Le message de retour -->
			</div>
		</form>



	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/ajaxform.js"></script>
	</body>
</html>