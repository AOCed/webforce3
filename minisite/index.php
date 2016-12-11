<?php 
require_once('./inc/init_session.inc.php');


?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title> <?php echo SITE_NAME; ?> </title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php 
		if (isset($_SESSION['user'])) {
			echo '<p style="text-align:center;" id="listeProduit">';
			echo "Bonjour, ".$_SESSION['user']['name']; 
			echo "</p>";
			// Si je suis bien admin, j'affiche un lien pour ajouter des produits.
			if ($_SESSION['user']['type'] == 'admin') {
				echo '<p style="text-align:center;" id="listeProduit">';
				echo "<br><a href='add_modify_products.php?' id='ajoutProduit'>Ajouter un produit</a>";
				echo "</p>";
			}
		} 
		?>
		<br />
		<br />
		<h2>Liste de nos produits</h2>
		<table>
			<tr>
				<th>Nom</th>
				<th>Ref</th>
				<th>Prix</th>
				<th>Description</th>
				<?php  
					if(isset($_SESSION['user']['type']) && ($_SESSION['user']['type'] == "admin")) {
						echo "<th></th>";
					}
				?>
			</tr>

			<?php  
				$sql = "SELECT * FROM products";
				$req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

				// Tant qu'on peut mettre une nouvelle ligne de résultat dans la variable $datas, on continue la boucle
				while ($datas = mysqli_fetch_assoc($req)) {
					echo "<tr>";
					echo "<td>".$datas['pr_name']."</td>";
					echo "<td>".$datas['pr_ref']."</td>";
					echo "<td>".$datas['pr_price']."</td>";
					echo "<td>".$datas['pr_description']."</td>";

					if(isset($_SESSION['user']['type']) && ($_SESSION['user']['type'] == "admin")) {
						echo "<td><a href='add_modify_products.php?id=".$datas['pr_id']."' id='modifProduit'>Modifier</a></td>";
					}
					if(isset($_SESSION['user']['type']) && ($_SESSION['user']['type'] == "admin")) {
						echo "<td><a href='libs/services_products.php?action=delete&id=".$datas['pr_id']."' id='supprProduit'>Supprimer</a></td>";
					}
				echo "</tr>";
				}
			?>
		</table>
	</body>
</html>
