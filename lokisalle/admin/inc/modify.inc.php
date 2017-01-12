
<?php 
include_once('header.inc.php');
include_once('../../inc/init.inc.php');

if(!empty($_GET['id_salle'])) {

	$sql = "SELECT * from salle WHERE id_salle=".$_GET['id_salle'];
	$req = $connexion->query($sql);
	$data = $req->fetch(PDO::FETCH_ASSOC);
}
?>
	<div class="container">
		<form action="../../libs/services_admin.php?action=modifSalle" method="post" name="salle" enctype="multipart/form-data">
			<input type="hidden" name="id_salle" value="<?php echo $data['id_salle']; ?>" />
			<input type="hidden" name="filepath" value="<?php echo $data['photo']; ?>" />
			<div class="row">
				<div class="col-md-6">
					<label>Titre</label>
					<input type="text" placeholder="Titre de la salle" name="titre" value="<?php echo $data['titre']; ?>" />
				</div>
				<div class="col-md-6">
					<label>Pays</label>
					<select name="pays">
						<option value="france" <?php if($data['pays'] == "france") { echo "selected"; } ?>>France</option>
						<option value="espagane" <?php if($data['pays'] == "espagne") { echo "selected"; } ?>>Espagne</option>
						<option value="italie" <?php if($data['pays'] == "italie") { echo "selected"; } ?>>Italy</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Description</label>
					<textarea name="description" id=""><?php echo $data['description']; ?></textarea>
				</div>
				<div class="col-md-6">
					<label>Ville</label>
					<select name="ville">
						<option value="paris" <?php if($data['ville'] == "paris") { echo "selected"; } ?>>Paris</option>
						<option value="lyon" <?php if($data['ville'] == "lyon") { echo "selected"; } ?>>Lyon</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Photo</label>
					<input type="file" name="image" accept="image/*" />
				</div>
				<div class="col-md-6">
					<label for="">Adresse</label>
					<textarea name="adresse"><?php echo $data['adresse']; ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="">Capacité</label>
					<input type="number" name="capacite" value="<?php echo $data['capacite']; ?>" />
				</div>
				<div class="col-md-6">
					<label for="">Code Postal</label>
					<input type="text" name="codepostal" placeholder="Code Postale de la salle" value="<?php echo $data['cp']; ?>" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				<label for="">Catégorie</label>
					<select name="categorie" id="">
						<option value="<?php echo $data['categorie']; ?>" selected><?php echo $data['categorie']; ?></option>
						<option value="bureau">Bureau</option>
					</select>
				</div>
				<div class="col-md-6">
					<input type="submit" value="Modifier" />
				</div>
			</div>
		</div>
	</body>