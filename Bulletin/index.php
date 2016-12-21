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
	<header>
		<h1>!Bienvenue .class {We (are) Friends 3};</h1>
	</header>
	

		<form action="libs/services.php?action=addScore" id="addScore" method="post">
<h2>Ajouter une note</h2>
		<?php echo displaySelect('students', 'stu_id', 'stu_fullname') ?>
		<?php echo displaySelect('subjects', 'sub_id', 'sub_name') ?>

		<label for="score">Note</label>
		<input type="text" name="score" />

		<input type="submit" value="envoyer">

	</form>
	<div id="ajouts">
		<form action="libs/services.php?action=addStudent" id="addStu" method="post">
			<h2>Ajouter un élève</h2>
			<label for="student">Nom d'elève</label>
			<input type="text" name="student" />

			<input type="submit" value="envoyer">
		</form>
		<form action="libs/services.php?action=addSubject" id="addSub" method="post">
			<h2>Ajouter une matière</h2>
			<label for="student">Nom de matière</label>
			<input type="text" name="subject" />

			<input type="submit" value="envoyer">
		</form>
	</div>
	<p>We &#9829; our students !</p>
		<table>
			<h2>Note moyenne</h2>
			 <tr>
				<th>Nom d'elève</th>
				<th>Note moyenne</th>
			</tr>

			<?php  
				$sql = "SELECT stu_id, stu_score, stu_fullname FROM students";	
				$req = $connection->prepare($sql);
				$req->execute();

				// Tant qu'on peut mettre une nouvelle ligne de résultat dans la variable $data, on continue la boucle
				while ($data= $req->fetch()) {
					echo "<tr>";
					echo "<td><a href='index.php?id=".$data['stu_id']."' id=modifScore>".$data['stu_fullname']." </a></td>";
					echo "<td>".calculAverage($data['stu_id'])."</td>";
			/*		echo "<td>".getResultsBySubject(2)['scoreAvg']."</td>";*/
					/*echo "<td>".showScore(1, $data['stu_id'])."</td>";*/
					/*echo "<td>".getResultsBySubject(2)['scoreAvg']."</td>";
					echo "<td>".getResultsBySubject(3)['scoreAvg']."</td>";
					echo "<td>".getResultsBySubject(4)['scoreAvg']."</td>";
					echo "<td>".getResultsBySubject(5)['scoreAvg']."</td>";*/

					/*echo "<td><a href='add_modif_scores.php?id=".$data['stu_id']."' id=modifScore>> ici <</a></td>";*/
					/*echo "<td><a href='libs/services.php?action=delete&id=".$data['stu_id']."' id='supprScore'>Supprimer</a></td>";*/
				echo "</tr>";
				}
			?>
		</table>
		<?php if (!empty($_GET['id'])) {
		echo showScore($_GET['id']);}?>
	</body>
</html>