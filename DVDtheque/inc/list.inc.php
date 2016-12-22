
<?php
require_once('init.inc.php');
if(empty($_GET['where'])) {
$sql = "SELECT * FROM `list` ORDER BY `list`.`dvd_id` DESC";
} else {
	$sql = "SELECT * FROM `list` WHERE dvd_title like '".$_GET['where']."%' ORDER BY `list`.`dvd_id` DESC";
}

$req = $connection->query($sql);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
 	 <META NAME="keywords" lang="fr" CONTENT="<?php echo $_ENV['keywords']; ?>">
  	<META NAME="description" CONTENT="<?php echo $_ENV['description']; ?>">
 	 <title><?php echo $_ENV['title']; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<table>

	<?php 
		echo showLetters();
	?>	

	<tr>
		<th><a href="index.php?page=2&action=sort">Title</a></th>
		<th id="story"><a href="">Story</a></th>
		<th><a href="">Director</a></th>
		<th><a href="">Actors</a></th>
		<th><a href="">Genre</a></th>
		<th><a href="">Year</a></th>
	</tr>
	<?php


		while($datas = $req->fetch()){
			echo "<tr>";
			echo "	<td>".$datas['dvd_title']."</td>";
			echo "	<td id='story'>".$datas['dvd_story']."</td>";
			echo "	<td>".$datas['dvd_director']."</td>";
			echo "	<td>".$datas['dvd_actors']."</td>";
			echo "	<td>".$datas['dvd_genre']."</td>";
			echo "	<td>".$datas['dvd_year']."</td>";
			echo "</tr>";
		}
	?>
</table>