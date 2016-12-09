<?php 
require_once('./inc/init_session.inc.php');
if (isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 'admin') {

	// Tester si on est en Modify ou en Add
	if(!empty($_GET['id'])){
		$actionName = "modify";
		$sql = "SELECT * from products WHERE pr_id=".$_GET['id'];
		$req = mysqli_query($connexion, $sql);
		$datas = mysqli_fetch_assoc($req);
		//print_r($datas);
	}else {
		$actionName = "add";

		/*comme on utilise des valeurs de $datas dans le formulaire 
		et comme on est dans un nouveau produit, alros il faut que 
		je déclare mon tableau datas à vide*/
		$datas['pr_id'] = 0;
		$datas['pr_name'] = "";
		$datas['pr_ref'] = "";
		$datas['pr_price'] = "";
		$datas['pr_description'] = "";
 	}

} else {
	// Si je suis pas admin, retour à l'index
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title> <?php echo SITE_NAME; ?> </title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<form action="./libs/services_products.php?action=<?php echo $actionName;?>" method="post" id="addProduct">
			<input type="hidden" name="prId" value="<?php echo $datas['pr_id']; ?>" />
			<label for="">Nom du produit</label>
			<input type="text" name="prName" placeholder="nom de produit" value="<?php echo $datas['pr_name']; ?>" /><br>
			<label for="">Référence du produit</label>
			<input type="text" name="prRef" placeholder="référence de produit" value="<?php echo $datas['pr_ref']; ?>" /><br>
			<label for="">Prix du produit</label>
			<input type="text" name="prPrice" placeholder="prix de produit" value="<?php echo $datas['pr_price']; ?>" /><br>
			<label for="">Description du produit</label>
			<textarea name="prDescription" placeholder="description de produit"><?php echo $datas['pr_description']; ?></textarea><br>
			<input type="submit" value="Ajouter le produit" />
		</form>
	</body>
</html>
