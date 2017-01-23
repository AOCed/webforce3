<?php

// view/abonne-edit.php

require 'layout/top.php';
?>

<h2>Abonné</h2>
	<form method="POST">
		<input type="hidden" name="id" value="<?= $abonne->getId(); ?>" />
		<div class="form-group <?php if(isset($errors['nom'])) {echo "has-error";} ?> ">
			<label for="">Nom</label>
			<input type="text" name="nom"  class="form-control" value="<?= htmlentities($abonne->getNom()); ?>"/>
			<?php if(isset($errors['nom'])): ?>
				<span class="help-block"><?= $errors['nom']; ?></span>
			<?php endif;?>
		</div>	
		<div class="form-group <?php if(isset($errors['prenom'])) {echo "has-error";} ?> ">
			<label for="">Prénom</label>
			<input type="text" name="prenom"  class="form-control" value="<?= htmlentities($abonne->getPrenom()); ?>"/>
			<?php if(isset($errors['prenom'])): ?>
				<span class="help-block"><?= $errors['prenom']; ?></span>
			<?php endif;?>
		</div>
		<div class="form-group <?php if(isset($errors['email'])) {echo "has-error";} ?> ">
			<label for="">Email</label>
			<input type="email" name="email"  class="form-control" value="<?= htmlentities($abonne->getEmail()); ?>"/>
			<?php if(isset($errors['email'])): ?>
				<span class="help-block"><?= $errors['email']; ?></span>
			<?php endif;?>
		</div>		
		<button type="submit" class="btn btn-btn-primary">Modifier</button>
	</form>


<?php 
require 'layout/bottom.php';

