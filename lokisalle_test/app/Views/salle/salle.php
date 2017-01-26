<?php $this->layout('layout', ['title' => 'Gestion des salles']) ?>

<?php $this->start('main_content') ?>
	<h2>Gestion des salles</h2>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $salles['id_salle']; ?>" />
		<div class="row">
			<div class="form-group col-md-4">
				<label for="">Titre</label>
				<input type="text" class="form-control" name="titre" value="<?= $salle['titre']?>" placeholder="Titre de salle" />
				<label for="">Description</label>
				<textarea name="description" class="form-control"><?= $salle['description']?></textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="">Pays</label>
				<input type="text" class="form-control" name="pays" placeholder="Pays" value="<?= $salle['pays']?>"/>
				<label for="">Ville</label>
				<input type="text" class="form-control" name="ville" placeholder="Pays" value="<?= $salle['ville']?>" />
			</div>
			<div class="form-group col-md-4">
				<label for="">Photo</label>
				<input type="text" class="form-control" name="photo" placeholder="Photo" value="<?= $salle['photo']?>"/>
				<label for="">Adresse</label>
				<input type="text" class="form-control" name="adresse" placeholder="Adresse" value="<?= $salle['adresse']?>" />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Code Postasle</label>
				<input type="text" class="form-control" name="cp" placeholder="Code Postale" value="<?= $salle['cp']?>"/>
				<label for="">Capacité</label>
				<input type="text" class="form-control" name="capacite" placeholder="Capacité de salle" value="<?= $salle['capacite']?>" />
			</div>
			<div class="form-group col-md-6">
				<label for="">Categorie</label>
				<input type="text" class="form-control" name="categorie" placeholder="Type de categorie" value="<?= $salle['categorie']?>"/>
			</div>
		</div>
			<div class="form-group"><input type="submit" class="btn btn-default" value="Envoyer" /></div>
	</form>
	<table class="table table-bordered">
		<tr>
			<th>Id_Salle</th>
			<th>Titre</th>
			<th>Description</th>
			<th>Pays</th>
			<th>Ville</th>
			<th>Photo</th>
			<th>Adresse</th>
			<th>Code Postale</th>
			<th>Catégorie</th>
			<th>Capacité</th>
			<th colspan="3">Action</th>
		</tr>
	<?php foreach ($salles as $salle) : ?>
		<tr>
		<td><?= $salle['id_salle'];?></td>
			<td><?= $salle['titre'];?></td>
			<td><?= $salle['description'];?></td>
			<td><?= $salle['pays']?></td>
			<td><?= $salle['ville']?></td>
			<td><?= $salle['photo']?></td>
			<td><?= $salle['adresse']?></td>
			<td><?= $salle['cp']?></td>
			<td><?= $salle['categorie']?></td>
			<td><?= $salle['capacite']?></td>
			<td><a href="<?= $this->url('salle3', ['id' => $salle['id_salle']]) ?>" style="color:green">Modifier</a><a href="<?= $this->url('salle2', ['id' => $salle['id_salle']]) ?>">Supprimer</a></td>
			</tr>
	<?php endforeach;?>
<?php $this->stop('main_content') ?>



