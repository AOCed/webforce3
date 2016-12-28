<?php 

	function convertisseurDevise($montant, $deviseOutput){

		// Vérification des données entrées via method Post

		if(!empty($_POST['montant']) && !empty($_POST['deviseInput']) && !empty($_POST['deviseOutput']) && ($_POST['deviseInput'] != $_POST['deviseOutput'])) {

			$montant = intval($_POST['montant']);
			$deviseInput = $_POST['deviseInput'];
			$deviseOutput = $_POST['deviseOutput'];
			$tauxUsdEur = 0.96; 
			$tauxEurUsd = 1.04; 

			if($deviseInput == "eur") {
				$convertiEnUsd = $montant * $tauxEurUsd;
				return $convertiEnUsd;
			} 
			if($deviseInput == "usd") {
				$convertiEnEur = $montant * $tauxUsdEur;
				return $convertiEnEur;
			}

		} else {
			echo "Vous n'avez pas donné d'information correcte.<br />";
		}
	}


?>


<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Convertisseur de Devise</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<form action="index.php" method="post" name="convert">
			<label for="convert">Convertisseur de devise</label>
			<input type="number" name="montant" />

			<label for="deviseInput">De</label>
			<select name="deviseInput" >
				<option value=""></option>
				<option value="eur">EUR</option>
				<option value="usd">USD</option>
			</select>

			<label for="deviseOutput">A</label>
			<select name="deviseOutput">
				<option value=""></option>
				<option value="eur">EUR</option>
				<option value="usd">USD</option>
			</select>

			<input type="submit" value="Convertir" />
		</form>


		<p>
		<?php 
			if (!empty($_POST['montant']) && !empty($_POST['deviseOutput']) && !empty($_POST['deviseInput'])) {
				echo $_POST['montant']." ".$_POST['deviseInput']." = ".convertisseurDevise($_POST['montant'], $_POST['deviseOutput'])." ".$_POST['deviseOutput']; 
			} else {
				// le message d'erreur que j'ai prépare affiche toujours, meme quand aucun champs est saisi...alors j'ai désactivé...
				// echo "Vous n'avez pas donné d'information correcte.<br />";
			}
			?>			
		</p>
	
	</body>
</html>