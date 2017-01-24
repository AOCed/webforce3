<?php $this->layout('layout', ['title' => 'Gestion des salles']) ?>

<?php $this->start('main_content') ?>
	<h2>Gestion des salles</h2>
	<form action="">
		<div class="row">
			<div class="form-group col-md-4">
				<label for="">Titre</label>
				<input type="text" class="form-control" name="titre" placeholder="Titre de salle" />
				<label for="">Description</label>
				<textarea name="description" class="form-control">Description de salle</textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="">Pays</label>
				<input type="text" class="form-control" name="pays" placeholder="Pays" />
				<label for="">Ville</label>
				<input type="text" class="form-control" name="ville" placeholder="Pays" />
			</div>
			<div class="form-group col-md-4">
				<label for="">Photo</label>
				<input type="text" class="form-control" name="photo" placeholder="Photo" />
				<label for="">Adresse</label>
				<input type="text" class="form-control" name="adresse" placeholder="Adresse" />
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="">Code Postasle</label>
				<input type="text" class="form-control" name="cp" placeholder="Code Postale" />
				<label for="">Capacité</label>
				<input type="text" class="form-control" name="capacite" placeholder="Capacité de salle" />
			</div>
			<div class="form-group col-md-6">
				<label for="">Categorie</label>
				<input type="text" class="form-control" name="categorie" placeholder="Type de categorie" />
				<input type="submit" class="btn btn-default" value="Envoyer" />
			</div>
		</div>
	</form>
	
<?php $this->stop('main_content') ?>


