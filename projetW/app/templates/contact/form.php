<?php $this->layout('layout', ['title' => 'Formulaire']) ?>

<?php $this->start('main_content') ?>
	<h2>Formulaire</h2>
	<form method="post" action="<?= $this->url('contact2') ?>">
		<div class="container">
			<div class="row">
			<div class="form-group col-md-4">
				<label for="">Nom</label>
				<input type="text" class="form-control" name="nom" placeholder="Votre nom" />
			</div>
			<div class="form-group col-md-4">
				<label for="">Email</label>
				<input type="text" class="form-control" name="email" placeholder="Votre email" />
			</div>
			<div class="form-group col-md-4">
				<label for="">Message</label>
				<textarea name="message" class="form-control" placeholder="votre message"></textarea>
			</div>
			</div>
			<input type="submit" class="btn btn-default" value="Envoyer" />
	</form>
	<br>
	<a href="<?= $this->url('home'); ?>">Retour à l'acceuil</a>
	
<?php $this->stop('main_content') ?>
