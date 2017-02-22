<?php

require_once 'connect.php';

$order = '';

if (isset($_GET['order']) && isset($_GET['column'])) {
	if (!empty($_GET['column'])) {
		//$order = ' ORDER BY ' . $_GET['column'];
	}

	if ($_GET['column'] == 'lastname') {
		$order = ' ORDER BY lastname';

	}
	elseif ($_GET['column'] == 'firstname') {
		$order = ' ORDER BY firstname';

	}
	elseif ($_GET['column'] == 'birthdate') {
		$order = ' ORDER BY birthdate';

	}

	if ($_GET['order'] == 'asc') {
		// Dans la BDD, on trie par date de naissance, mais en réalité, on veut trier par âge. Or, plus la date de naissance est petite plus l'âge est grand... Donc on veut inverser l'ordre !
		if ($_GET['column'] == 'birthdate') {
			$order .= ' DESC';
		} else { // Sinon, si on est dans le reste des situations, on trie bien en ASC
			$order.= ' ASC';
		}
	} elseif($_GET['order'] == 'desc') {
		// Même souci
		if ($_GET['column'] == 'birthdate') {
			$order .= ' ASC';
		} else {
			$order .= ' DESC';
		}
	}
}

if(!empty($_POST)){
	// On va créer un tableau dans lequel on insèrera autant d'éléments qu'il y a de champs dans notre formulaire
	foreach ($_POST as $key => $value){
		$post[$key] = strip_tags(trim($value));
	}

	// On va ensuite initialiser un tableau pour gérer nos erreurs.
	$errors = array();

	// Pour chaque champ du formulaire, on vérifie si ce qu'a renseigné l'utilisateur est correct ou non. En cas d'erreur, on ajoute un message d'erreur dans notre tableau des erreurs
	if (strlen($post['firstname']) < 3) {
		$errors[] = 'Le prénom doit comporter au moins 3 caractères';
	}

	if (strlen($post['lastname']) < 3) {
		$errors[] = 'Le nom doit comporter au moins 3 caractères';
	}

	if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = 'L\'adresse email est invalide';
	}

	if (empty($post['birthdate'])) {
		$errors[] = 'La date de naissance doit être complétée';
	}

	if (empty($post['city'])) {
		$errors[] = 'La ville ne peut être vide';
	}

	// Si le tableau des erreurs est vide, alors on procède à la requête
	if (!count($errors)) {
		$sql = 'INSERT INTO users (gender, firstname, lastname, email, birthdate, city) VALUES(:gender, :firstname, :lastname, :email, :birthdate, :city)';

		$insertUser = $db->prepare($sql);
		$insertUser->bindValue(':gender', $post['gender']);
		$insertUser->bindValue(':firstname', $post['firstname']);
		$insertUser->bindValue(':lastname', $post['lastname']);
		$insertUser->bindValue(':email', $post['email']);
		$insertUser->bindValue(':birthdate', date('Y-m-d', strtotime($post['birthdate'])));
		$insertUser->bindValue(':city', $post['city']);

		if ($insertUser->execute()){
			$createUser = true;
		} else {
			$errors[] = 'Erreur SQL';
		}
	}
}

$sql = 'SELECT * FROM users'.$order;

$queryUsers = $db->prepare($sql);
if ($queryUsers->execute()) {
	$users = $queryUsers->fetchAll();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exercice 2</title>
	<meta charset="utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

	<h1>Liste des utilisateurs</h1>

	<p>Trier par :
		<a href="index.php?column=firstname&amp;order=asc">Prénom (croissant)</a> |
		<a href="index.php?column=firstname&amp;order=desc">Prénom (décroissant)</a> |
		<a href="index.php?column=lastname&amp;order=asc">Nom (croissant)</a> |
		<a href="index.php?column=lastname&amp;order=desc">Nom (décroissant)</a> |
		<a href="index.php?column=birthdate&amp;order=asc">Âge (croissant)</a> |
		<a href="index.php?column=birthdate&amp;order=desc">Âge (décroissant)</a>
	</p>
	<br>

	<div class="row">
<?php
if (isset($createUser) && $createUser == true){
	echo '<div class="col-md-6 col-md-offset-3">';
	echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès.</div>';
	echo '</div><br>';
}

if (!empty($errors)){
	echo '<div class="col-md-6 col-md-offset-3">';
	echo '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
	echo '</div><br>';
}
?>
		<div class="col-md-7">

			<?php if (!empty($users)): ?>
			<table class="table">
				<thead>
					<tr>
						<th>Civilité</th>
						<th>Prénom</th>
						<th>Nom</th>
						<th>Email</th>
						<th>Âge</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user):?>
					<tr>
						<td><?php echo $user['gender'];?></td>
						<td><?php echo $user['firstname'];?></td>
						<td><?php echo $user['lastname'];?></td>
						<td><?php echo $user['email'];?></td>
						<td><?php echo DateTime::createFromFormat('Y-m-d', $user['birthdate'])->diff(new DateTime('now'))->y;?> ans</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php else: ?>
			<p>
				Aucun utilisateur n'a été trouvé
			</p>
			<?php endif; ?>

		</div>

		<div class="col-md-5">

			<form action="" method="post" class="form-horizontal well well-sm">
			<fieldset>

				<legend>Ajouter un utilisateur</legend>

				<div class="form-group">
					<label class="col-md-4 control-label" for="gender">Civilité</label>
					<div class="col-md-8">
						<select id="gender" name="gender" class="form-control input-md" required>
							<option value="Mlle">Mademoiselle</option>
							<option value="Mme">Madame</option>
							<option value="M">Monsieur</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="firstname">Prénom</label>
					<div class="col-md-8">
						<input id="firstname" name="firstname" type="text" class="form-control input-md" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="lastname">Nom</label>
					<div class="col-md-8">
						<input id="lastname" name="lastname" type="text" class="form-control input-md" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="email">Email</label>
					<div class="col-md-8">
						<input id="email" name="email" type="email" class="form-control input-md" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="city">Ville</label>
					<div class="col-md-8">
						<input id="city" name="city" type="text" class="form-control input-md" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="birthdate">Date de naissance</label>
					<div class="col-md-8">
						<input id="birthdate" name="birthdate" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md" required>
						<span class="help-block">au format JJ-MM-AAAA</span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-4 col-md-offset-4">
						<button type="submit" class="btn btn-primary">Envoyer</button>
					</div>
				</div>

			</fieldset>
			</form>

		</div>

	</div>

</div>
</body>
</html>
