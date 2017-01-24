<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<p>Auteur : <?= $username; ?></p>
	<h2>Let's code.</h2>
<?php $this->stop('main_content') ?>
