<?php
// view/abonne.php

require 'layout/top.php';
?>
	<h2>Abonnés</h2>
	<?php 
		if (isset($_SESSION['msg'])) {
			echo '<div class="alert alert-success" role="alert">'.$_SESSION['msg'].'</div>';
			unset($_SESSION['msg']);
		}
	?>
	
	<p><a href="abonne-edit.php">Ajouter un abonné</a></p>
	<div class="well">
		<h3>Chercher les abonnés par leur nom</h3>
		<form>
			<div class="form-group">
				<input type="text" name="nom" class="form-control"/>
			</div>
			<button type="submit" class="btn btn-default">Rechcercher</button>
		</form>
	</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>Id</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Email</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
			foreach ($abonnes as $abonne) :
		?>
		<tr>		
			<td><?= $abonne->getId();?></td>
			<td><?= $abonne->getPrenom();?></td>
			<td><?= $abonne->getNom();?></td>
			<td><?= $abonne->getEmail();?></td>
			<td><a href="abonne-edit.php?id=<?= $abonne->getId() ?>" style="color:green">Modifier</a> | <a href="abonne-delete.php?id=<?= $abonne->getId() ?>" style="color:red">Supprimer</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php
require 'layout/bottom.php';