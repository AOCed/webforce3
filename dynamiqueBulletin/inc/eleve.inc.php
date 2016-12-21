<form action="libs/services.php?action=addEleve" method="post">
	<input type="text" name="nom" placeholder="nom"/>
	<input type="text" name="prenom" placeholder="prénom"/>
	<input type="submit"/>
</form>
<?php echo displayListEleves(); ?>