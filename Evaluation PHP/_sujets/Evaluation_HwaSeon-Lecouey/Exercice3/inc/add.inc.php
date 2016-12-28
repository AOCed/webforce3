
<!-- Formulaire pour ajouter des nouveaux films -->
<form action="libs/services.php?action=add" method="post">
	<!-- Champs pour ajouter titre, réalisateur, acteurs, producteur et synopsis -->
	<input type="text" name="title" placeholder="titre"/>
	<input type="text" name="director" placeholder="nom du réalisateur"/>
	<input type="text" name="actors" placeholder="acteurs"/>
	<input type="text" name="producer" placeholder="producteur"/>
	<input type="text" name="storyline" placeholder="synopsis"/>
	<input type="url" name="video" placeholder="bande annonce" />
	
	<!-- Champs pour ajouter l'année de production -->
	<label for="year">Année de production</label>
	<select name="year" id="year">
		<?php 
			for	($i= date('Y'); $i>=1920; $i--){
		      echo "<option>$i</option>";
		   }
		?>
	</select>

	<!-- Champs pour ajouter la langue -->
	<label for="language">Langue</label>
	<select name="language" id="language">
		<option value="1" selected="selected">Français</option>
		<option value="2">Anglais</option>
		<option value="3">Espagnol</option>
		<option value="4">Autres</option>
	</select>
	<!-- Champs pour ajouter la catégorie -->
	<label for="category">Catégorie</label>
	<select name="category" id="category">
		<option value="1" selected="selected">Action</option>
		<option value="2">Comedie</option>
		<option value="3">Scifiction</option>
		<option value="4">Drama</option>
		<option value="5">Thriller</option>
		<option value="6">Autre</option>
	</select>

	<input type="submit"/>
</form>

