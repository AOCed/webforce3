<?php

	require_once('init.inc.php');
// Prépare la requete avec GET where pour pouvoir utiliser dans l'affiche des détails du film cliqué
	if(empty($_GET['where'])) {
		$sql = "SELECT id, title, director, year_of_prod FROM `movies` ORDER BY `movies`.`id` DESC";
		} else {
		$sql = "SELECT * FROM `movies` WHERE id = ".$_GET['where'];
		}
	$req = $connection->query($sql);
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
	 	<meta NAME="keywords" lang="fr" CONTENT="<?php echo $_ENV['keywords']; ?>">
	  	<meta NAME="description" CONTENT="<?php echo $_ENV['description']; ?>">
	 	<title><?php echo $_ENV['title']; ?></title>
		<link rel="stylesheet" href="css/style.css">
	</head>

<!-- Affichage de la liste quand quelqu'un clique sur Plus d'Infos -->
<?php 
	if(!empty($_GET['where'])) {
?> 
	<table>
	<tr>
		<th class="fiche">Titre du film</th>
		<th class="fiche">Réalisateur</th>
		<th class="fiche">Année de production</th>
		<th class="fiche">Acteurs</th>
		<th class="fiche">Producteur</th>
		<th class="fiche">Language</th>
		<th class="fiche">Categorie</th>
		<th class="fiche" id="story">Synopsis</th>
		<th class="fiche">Lien pour la bande annonce</th>
	</tr>

<?php		

	while($datas = $req->fetch()){
		echo "<tr>";
		echo "<td>".$datas['title']."</td>";
		echo "<td>".$datas['director']."</td>";
		echo "<td>".$datas['year_of_prod']."</td>";
		echo "<td>".$datas['actors']."</td>";
		echo "<td>".$datas['producer']."</td>";
		echo "<td>".$datas['language']."</td>";
		echo "<td>".$datas['category']."</td>";
		echo "<td id='story'>".$datas['storyline']."</td>";
		echo "<td>".$datas['video']."</td>";
		echo "</tr>";
	} 
	} else { 
		?>
	</table>
<!-- Affichage de la liste des films en général -->
	<table>
		<tr>
			<th>Titre du film</th>
			<th>Réalisateur</th>
			<th>Année de production</th>
			<th>Plus d'infos</th>
		</tr>
<?php

	while($datas = $req->fetch()){
		echo "<tr>";
		echo "	<td>".$datas['title']."</td>";
		echo "	<td>".$datas['director']."</td>";
		echo "	<td>".$datas['year_of_prod']."</td>";
		echo "	<td><a href='index.php?page=2&where=".$datas['id']."'>Fiche</a></td>";
		echo "</tr>";
	}
}
?>
	</table>

