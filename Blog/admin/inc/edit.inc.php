<!DOCTYPE html>
<html lang="fr">
	<head>	
		<meta charset="UTF-8">
		<title>Backoffice</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<form action="../libs/admin_services.php?action=postArticle" method="post" enctype="multipart/form-data">
			<div>
				<label for="title">Titre</label>
				<input type="text" name="title" id="title" />
			</div>
			<div>
				<label for="text">Texte</label>
				<textarea name="text" id="text" /></textarea>			
			</div>
			<div>
				<label for="image">Image</label>
				<input type="file" name="image" id="image" accept="image/*" /></input>			
			</div>
			<input type="submit" />
		</form>
	</body>
</html>