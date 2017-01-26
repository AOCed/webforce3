<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>	
	<a href="<?= $this->url('test'); ?>">Test</a>
	<br>
	<a href="<?= $this->url('contact'); ?>">Contactez  nous!</a>
<?php $this->stop('main_content') ?>
