<?php 
require_once("../inc/init.inc.php");
if (empty($_GET['action'])) {
	$sql = "SELECT * FROM salle";
	$req = $connexion->prepare($sql);
	$req->execute();
};

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Gestion des salles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="../assets/css/style_admin.css">
	</head>
	<body>
		<header>
			<div class="container">
				<nav>
					<ul>
						<li><a href="#">Gestion des Salles</a></li>
						<li><a href="inc/product.inc.php">Gestion des produits</a></li>
						<li><a href="membres.inc.php">Gestion des membres</a></li>
						<li><a href="avis.inc.php">Gestion des avis</a></li>
						<li><a href="commandes.inc.php">Gestion des commandes</a></li>
						<li><a href="#" class="signout">Déconnexion</a></li>
					</ul>
				</nav>
			</div>
		</header>

<div class="container">
	<table>
		<tr>
			<th>id_salle</th>
			<th>titre</th>
			<th>description</th>
			<th>photo</th>
			<th>pays</th>
			<th>ville</th>
			<th>adresse</th>
			<th>code postal</th>
			<th>capacité</th>
			<th>catégorie</th>
			<th>action</th>
		</tr>
	<?php  

		while($data = $req->fetch()) {


// echo "<pre>";
// var_dump($req);
// echo "</pre>";
// die();
			echo "<tr>";
			echo "<td>".$data['id_salle']."</td>";
			echo "<td>".$data['titre']."</td>";
			echo "<td>".$data['description']."</td>";
			echo "<td><img src='../assets/".$data['photo']."'></td>";
			echo "<td>".$data['pays']."</td>";
			echo "<td>".$data['ville']."</td>";
			echo "<td>".$data['adresse']."</td>";
			echo "<td>".$data['cp']."</td>";
			echo "<td>".$data['capacite']."</td>";
			echo "<td>".$data['categorie']."</td>";
			echo "<td><i class='fa fa-search' aria-hidden='true'></i><a href='inc/modify.inc.php?id_salle=".$data['id_salle']."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='../libs/services_admin.php?action=deleteSalle&id=".$data['id_salle']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
			echo "</tr>";
		}
	?>
	</table>
</div>
<div class="container">
<form action="../libs/services_admin.php?action=addSalle" method="post" name="salle" enctype="multipart/form-data">

	<div class="row">
		<div class="col-md-6">
			<label>Titre</label>
			<input type="text" placeholder="Titre de la salle" name="titre" />
		</div>
		<div class="col-md-6">
			<label>Pays</label>
			<select name="pays">
				<option value="france" selected>France</option>
				<option value="espagane" >Espagne</option>
				<option value="italie" >Italy</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label>Description</label>
			<textarea name="description" id=""></textarea>
		</div>
		<div class="col-md-6">
			<label>Ville</label>
			<select name="ville">
				<option value="paris" selected>Paris</option>
				<option value="lyon" >Lyon</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label>Photo</label>
			<input type="file" name="image" >
		</div>
		<div class="col-md-6">
			<label for="">Adresse</label>
			<textarea name="adresse" id="">Adresse de la salle</textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="">Capacité</label>
			<input type="number" name="capacite" />
		</div>
		<div class="col-md-6">
			<label for="">Code Postal</label>
			<input type="text" name="codepostal" placeholder="Code Postale de la salle" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<label for="">Catégorie</label>
			<select name="categorie" id="">
				<option value="reunion" selected>Réunion</option>
				<option value="bureau" selected>Bureau</option>
			</select>
		</div>
		<div class="col-md-6">
			<input type="submit" value="Enregistrer" />
		</div>
	</div>
</div>
</form>

