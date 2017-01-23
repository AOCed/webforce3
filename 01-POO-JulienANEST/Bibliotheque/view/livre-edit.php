<?php

// view/livre-edit.php

require 'layout/top.php';
?>

<h2>Livre</h2>
	<form method="POST">
		<input type="hidden" name="id" value="<?= $livre->getId(); ?>" />
		<div class="form-group <?php if(isset($errors['titre'])) {echo "has-error";} ?> ">
			<label for="">Titre</label>
			<input type="text" name="titre"  class="form-control" value="<?= htmlentities($livre->getTitre()); ?>"/>
			<?php if(isset($errors['titre'])): ?>
				<span class="help-block"><?= $errors['titre']; ?></span>
			<?php endif;?>
		</div>	
		<div class="form-group <?php if(isset($errors['auteur'])) {echo "has-error";} ?> ">
			<label for="">Auteur</label>
			<input type="text" name="auteur"  class="form-control" value="<?= htmlentities($livre->getAuteur()); ?>"/>
			<?php if(isset($errors['auteur'])): ?>
				<span class="help-block"><?= $errors['auteur']; ?></span>
			<?php endif;?>
		</div>
		<div class="form-group <?php if(isset($errors['annee'])) {echo "has-error";} ?> ">
			<label for="">Annee</label>
			<input type="number" name="annee"  class="form-control" value="<?= htmlentities($livre->getAnnee()); ?>"/>
			<?php if(isset($errors['annee'])): ?>
				<span class="help-block"><?= $errors['annee']; ?></span>
			<?php endif;?>
		</div>
		<div class="form-group <?php if(isset($errors['description'])) {echo "has-error";} ?> ">
			<label for="">Description</label>
			<textarea name="description" class="form-control"><?= htmlentities($livre->getDescription()); ?></textarea>
			<?php if(isset($errors['description'])): ?>
				<span class="help-block"><?= $errors['description']; ?></span>
			<?php endif;?>
		</div>		
		<button type="submit" class="btn btn-btn-primary">Modifier</button>
	</form>


<?php 
require 'layout/bottom.php';

