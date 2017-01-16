<?php 
require_once("../inc/init.inc.php");
require_once('inc/functions.inc.php');
require_once('inc/header.inc.php');

$sql = "SELECT * FROM membre";
$req = $connexion->prepare($sql);
$req->execute();

if(!empty($_GET['id'])) { 

	$sql2 = "SELECT * from membre WHERE id_membre=".$_GET['id'];
	$req2 = $connexion->query($sql2);
	$data2 = $req2->fetch(PDO::FETCH_ASSOC);

	$pseudo = $data2['pseudo'];
	$email = $data2['email'];
	$mdp = $data2['mdp'];
	$civilite = $data2['civilite'];
	$nom = $data2['nom'];
	$prenom = $data2['prenom'];
	$statut = $data2['statut'];
	$action = "modifSalle";

} else {

	$titre = "";
	$description = "";
	$photo = "";
	$mdp = "";
	$civilite = "";
	$nom = "";
	$prenom = "";
	$capacite = "";
	$statut = "";
	$action = "addSalle";

}

?>
<!-- Formulaire de gestion des membres -->
<div class="container">
<form action="../libs/services_admin.php?action=<?php echo $action;?>" method="post" name="membre">

	<div class="row">
		<div class="col-md-6">
			<label>Pseudo</label>
			<input type="text" placeholder="pseudo" name="pseudo" value="<?php echo $pseudo; ?>" />
		</div>
		<div class="col-md-6">
			<label>email</label>
			<input type="email" placeholder="votre email" name="email" value="<?php echo $email; ?>" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label>Mot de Passe</label>
			<textarea name="mdp" id="mdp"><?php echo $mdp;?></textarea>
		</div>
		<div class="col-md-6">
			<label>Civilite</label>
			<select name="civilite">
				<option value="h" selected>Homme</option>
				<option value="f" >Femme</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="">nom</label>
			<textarea name="nom" id="nom"><?php echo $nom; ?></textarea>
		</div>
		<div class="col-md-6">
			<label for="">Statut</label>
			<select name="statut">
				<option value="admin" selected>Admin</option>
				<option value="membre" selected>Membre</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="">Prenom</label>
			<input type="text" name="prenom" value="<?php echo $prenom;?>" />
		</div>
				<div class="col-md-6">
			<input type="submit" value="Enregistrer" />
		</div>
	</div>
</div>
</form>

<!-- Affichage des données des membres -->
<div class="container">
	<table>
		<tr>
			<th>Id_membre</th>
			<th>pseudo</th>
			<th>nom</th>
			<th>prenom</th>
			<th>email</th>
			<th>civilite</th>
			<th>statut</th>
			<th>date_enregistrement</th>
			<th>action</th>
		</tr>
	<?php  
		while($data = $req->fetch()) {

			echo "<tr>";
			echo "<td>".$data['id_membre']."</td>";
			echo "<td>".$data['pseudo']."</td>";
			echo "<td>".$data['nom']."</td>";
			echo "<td>".$data['prenom']."</td>";
			echo "<td>".$data['email']."</td>";
			echo "<td>".$data['civilite']."</td>";
			echo "<td>".$data['statut']."</td>";
			echo "<td>".$data['date_enregistrement']."</td>";
			echo "<td><i class='fa fa-search' aria-hidden='true'></i><a href='membre.php?id=".$data['id_membre']."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='../libs/services_admin.php?action=deleteSalle&id=".$data['id_membre']."' ><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
			echo "</tr>";
		}
	?>
	</table>
</div>


