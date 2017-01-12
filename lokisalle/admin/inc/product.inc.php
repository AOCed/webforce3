<?php 
require_once('../../inc/init.inc.php');
include_once('header.inc.php');

$sql = "SELECT
  *
	FROM
  `produit`
  INNER JOIN `salle` ON `produit`.`id_salle` = `salle`.`id_salle`";
$req = $connexion->query($sql);

// echo "<pre>";
// var_dump($data);
// echo "</pre>";
// die();
?>

<div class="container">
	<table>
		<tr>
			<th>ID_Produit</th>
			<th>Date d'Arrivée</th>
			<th>Date de Départ</th>
			<th>ID_Salle</th>
			<th>Prix</th>
			<th>Etat</th>
			<th>Action</th>
		</tr>
	<?php  

		while($data = $req->fetch()) {

			echo "<tr>";
			echo "<td>".$data['id_produit']."</td>";
			echo "<td>".$data['date_arrivee']."</td>";
			echo "<td>".$data['date_depart']."</td>";
			echo "<td>".$data['titre']."<br><img src='../../assets/".$data['photo']."'></td>";
			echo "<td>".$data['prix']."</td>";
			echo "<td>".$data['etat']."</td>";
			echo "<td><i class='fa fa-search' aria-hidden='true'></i><a href='inc/modify.inc.php?id_salle=".$data['id_salle']."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='inc/modify.inc.php?=".$data['id_salle']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
			echo "</tr>";
		}
	?>
	</table>
</div>
<!-- <div class="container">
	<form action="">
		<div class="row">
			<div class="col-md-6">
				<label for="">Date d'arrivée</label>
				<input id="datetimepicker" type="text" value="00/00/0000/00:00" />
			</div>
			<div class="col-md-6">
				<label for="">Salle</label>
				<select name="" id="">
					<option value="">Salle 1</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<label for="">Date de départ</label>
				<input id="datetimepicker" type="text" value="00/00/0000/00:00" />
			</div>
			<div class="col-md-6">
				<label for="">Tarif</label>
				<select name="" id="">
					<option value="">Tarif</option>
				</select>
			</div>
		</div>
	</form>
</div> -->


  </body>
<html>a