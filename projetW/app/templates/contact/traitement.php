<?php $this->layout('layout', ['title' => 'Traitement']) ?>

<?php $this->start('main_content') ?>

<p><?php if($erreur) {echo $erreur;} else {echo $ok;} ?></p>
<p><?= $nom ?></p>
<p><?= $email ?></p>
<p><?= $message ?></p>

<a href="<?= $this->url('home'); ?>">Retour à l'acceuil</a>

<?php $this->stop('main_content') ?>