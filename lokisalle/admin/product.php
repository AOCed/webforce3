<?php 
require_once('../inc/init.inc.php');
require_once('inc/functions.inc.php');
include_once('inc/header.inc.php');

$sql = "SELECT
  * FROM
  `produit`
  INNER JOIN `salle` on `produit`.`id_salle` = `salle`.`id_salle`";
$req = $connexion->query($sql);

if(!empty($_GET['id'])) { 

	$sql2 = "SELECT
	  `salle`.*,
	  `produit`.*
	FROM
	  `produit`
		INNER JOIN `salle` ON `produit`.`id_salle` = `salle`.`id_salle` WHERE  produit.`id_produit`=".$_GET['id'];

	$req2 = $connexion->query($sql2);
	$data2 = $req2->fetch();

	$dateArrivee = $data2['date_arrivee'];
	$dateDepart = $data2['date_depart'];
	$salle = '<select name="salle"><option value='.$_GET['id'].">".$data2['id_salle']." - ".$data2['titre']." - ".$data2['adresse'].", ".$data2['cp'].', '.$data2['ville']." - ".$data2['capacite']."pers".'</option></select>';
	$tarif = $data2['prix'];
	$action = "modifProduct";
	$type = "text";

} else {

	$dateArrivee = "";
	$dateDepart = "";
	$salle = displaySelect();
	$tarif = "";
	$action = "addProduct";
	$type = "datetime-local";

}

?>
<div class="container">
	<form action="../libs/services_admin.php?action=<?php echo $action; ?>" method="post" name="product">
		<div class="row">
			<div class="col-md-6">
				<label class="control-label" for="arrive">Date d'arrivée</label>
				<div class="input-group">
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span> 
					</div>
					<input type="<?php echo $type; ?>" value="<?php echo $dateArrivee ?>" name="arrivee">
				</div>
			</div>
			<div class="col-md-6">
				<label for="salle">Salle</label>
				<?php echo $salle; ?>			
				</div>
		</div>
		<div class="row">
			<div class="col-md-6">	
				<label class="control-label" for="depart">Date de départ</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span> 
						</div>
					<input type="<?php echo $type; ?>" value="<?php echo $dateDepart; ?>" name="depart">
					</div>
			</div>
			<div class="col-md-6">	
				<label class="control-label" for="tarif">Tarif</label>
					<div class="input-group">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-euro"></span> 
						</div>
					<input type="number" name="tarif" value="<?php echo $tarif ?>" />
					</div>
			</div>
		</div>
		<input class="product" type="submit" value="Enregistrer" />
	</form>
</div>

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
			echo "<td>".$data['id_salle']." - ".$data['titre']."<br><img src='../assets/".$data['photo']."'></td>";
			echo "<td>".$data['prix']." €</td>";
			echo "<td>".$data['etat']."</td>";
			echo "<td><i class='fa fa-search' aria-hidden='true'></i><a href='product.php?id=".$data['id_produit']."'><i class='fa fa-pencil' aria-hidden='true'></i></a><a href='../libs/services_admin.php?action=deleteProduct&id=".$data['id_produit']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
			echo "</tr>";
		}
	?>
	</table>
</div>

</body>
<html>