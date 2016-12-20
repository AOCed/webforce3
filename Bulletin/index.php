<?php 
require_once('inc/init.inc.php');
require_once('inc/functions.inc.php');

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Bulletin WF3</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	
	<h2>Ajouter une note</h2>
<form action="libs/services.php?action=addScore" method="post">
	
	<label for="student">Nom d'élève</label>
	<select name="student">
		<option value="1">Thomas Mion </option>
		<option value="2">Andrei Gache</option>
		<option value="3">Thibaud Molitor</option>
		<option value="4">Eramban</option>
	</select>

	<label for="subject">Matière</label>
	<select name="subject">
		<option value="1">html </option>
		<option value="2">css</option>
		<option value="3">javascript</option>
		<option value="4">php</option>
		<option value="5">mysql</option>
	</select>

	<label for="score">Note</label>
	<input type="text" name="score" />

	<input type="submit" value="envoyer">

</form>




		<table>
			 <tr>
				<th>Nom d'elève</th>
				<th>Note moyenne</th>
				<th>HTML</th>
				<th>CSS</th>
				<th>JAVASCRIPT</th>
				<th>PHP</th>
				<th>MYSQL</th>
				<th colspan="2">Modification</th>
			</tr>


			<?php  
				$sql = "SELECT stu_id, stu_score, stu_fullname FROM students";	
				$req = $connection->prepare($sql);
				$req->execute();



				// Tant qu'on peut mettre une nouvelle ligne de résultat dans la variable $data, on continue la boucle
				while ($data= $req->fetch()) {
					echo "<tr>";
					echo "<td>".$data['stu_fullname']."</td>";
					echo "<td>".calculAverage($data['stu_id'])."</td>";
					echo "<td>".showScore(1, $data['stu_id'])."</td>";
					echo "<td>".showScore(2, $data['stu_id'])."</td>";
					echo "<td>".showScore(3, $data['stu_id'])."</td>";
					echo "<td>".showScore(4, $data['stu_id'])."</td>";
					echo "<td>".showScore(5, $data['stu_id'])."</td>";

					//echo "<td>".$data['score']."</td>";
					echo "<td><a href='add_modif_scores.php' id=modifScore>Modifier</a></td>";
					echo "<td><a href='libs/services.php?action=delete&id=".$data['stu_id']."' id='supprScore'>Supprimer</a></td>";
				echo "</tr>";
				}
			?>
		</table>
	</body>
</html>