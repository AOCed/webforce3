<?php $this->layout('layout', ['title' => 'Test']) ?>

<?php $this->start('main_content') ?>
	<h2>La Page Test.</h2>
	<p>Mon premier contrôleur et ma première vue.</p>
	
	<!-- image dans le répertoire img -->
	<img src="<?= $this->assetUrl('img/camelcase.jpg'); ?>" alt="mon image" />
	<!-- Retour à l'accueil -->
	<br>	
	<a href="<?= $this->url('home'); ?>">Retour à l'acceuil</a>
	<?= $film; ?>
<?php $this->stop('main_content') ?>
