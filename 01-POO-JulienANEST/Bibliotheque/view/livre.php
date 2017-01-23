<?php
// view/livre.php

require 'layout/top.php';
?>

<h2>Livres</h2>
	<?php 
		if (isset($_SESSION['msg'])) {
			echo '<div class="alert alert-success" role="alert">'.$_SESSION['msg'].'</div>';
			unset($_SESSION['msg']);
		}
	?>
	
	<p><a href="livre-edit.php">Ajouter un livre</a></p>
	<div class="well">
		<h3>Chercher les livres par leur titre</h3>
		<form>
			<div class="form-group">
				<input type="text" name="titre" class="form-control"/>
			</div>
			<button type="submit" class="btn btn-default">Rechcercher</button>
		</form>
	</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>Id</th>
			<th>Titre</th>
			<th>Auteur</th>
			<th>Annee</th>
			<th>Description</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
			foreach ($livres as $livre) :
		?>
		<tr>		
			<td><?= $livre->getId();?></td>
			<td><?= $livre->getTitre();?></td>
			<td><?= $livre->getAuteur();?></td>
			<td><?= $livre->getAnnee();?></td>
			<td><?= $livre->getDescription();?></td>
			<td><a href="livre-edit.php?id=<?= $livre->getId() ?>" style="color:green">Modifier</a> | <a href="livre-delete.php?id=<?= $livre->getId() ?>" style="color:red">Supprimer</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php
require 'layout/bottom.php';
?>