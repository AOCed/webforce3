<?php 
require_once("../inc/init.inc.php");
require_once('inc/functions.inc.php');
require_once('inc/header.inc.php');

$sql = "SELECT * FROM salle";
$req = $connexion->prepare($sql);
$req->execute();

if(!empty($_GET['id'])) { 

	$sql2 = "SELECT * from salle WHERE id_salle=".$_GET['id'];
	$req2 = $connexion->query($sql2);
	$data2 = $req2->fetch(PDO::FETCH_ASSOC);

	$titre = $data2['titre'];
	$description = $data2['description'];
	$photo = "<img src='../assets/".$data2['photo'].">";
	$pays = $data2['pays'];
	$ville = $data2['ville'];
	$adresse = $data2['adresse'];
	$cp = $data2['cp'];
	$capacite = $data2['capacite'];
	$categorie = $data2['categorie'];
	$action = "modifSalle";

			// echo "<td><img src='../assets/".$data['photo']."'></td>";
} else {

	$titre = "";
	$description = "";
	$photo = "";
	$pays = "";
	$ville = "";
	$adresse = "";
	$cp = "";
	$capacite = "";
	$categorie = "";
	$action = "addSalle";

}

?>

<div class="container">
<form action="../libs/services_admin.php?action=<?php echo $action;?>" method="post" name="salle" enctype="multipart/form-data">
	<input type="hidden" name="id_salle" value="<?php echo $data['id_salle']; ?>" />
	<input type="hidden" name="filepath" value="<?php echo $data['photo']; ?>" />
	<div class="row">
		<div class="col-md-6">
			<label>Titre</label>
			<input type="text" placeholder="Titre de la salle" name="titre" value="<?php echo $titre; ?>" />
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
			<textarea name="description" id="description"><?php echo $description;?></textarea>
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
			<input type="file" name="image" value="<?php echo $photo; ?>">
		</div>
		<div class="col-md-6">
			<label for="">Adresse</label>
			<textarea name="adresse" id="adresse"><?php echo $adresse; ?></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="">Capacité</label>
			<input type="number" name="capacite" value="<?php echo $capacite;?>" />
		</div>
		<div class="col-md-6">
			<label for="">Code Postal</label>
			<input type="text" name="codepostal" placeholder="Code Postale de la salle" value="<?php echo $cp; ?>" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<label for="">Catégorie</label>
			<select name="categorie">
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
			echo "<td><i class='fa fa-search' aria-hidden='true'></i><a href='index.php?id=".$data['id_salle']."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='../libs/services_admin.php?action=deleteSalle&id=".$data['id_salle']."' ><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
			echo "</tr>";
		}
	?>
	</table>
</div>


