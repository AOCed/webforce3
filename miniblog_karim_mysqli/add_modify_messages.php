<?php 
require_once('./inc/init_session.inc.php');

if (isset($_SESSION['user'])) {

	// Tester si on est en Modify ou en Add
	if(!empty($_GET['id'])){
		$actionName = "modify";
		$sql = "SELECT * from messages WHERE pr_id=".$_GET['id'];
		$req = mysqli_query($connexion, $sql);
		$datas = mysqli_fetch_assoc($req);
		//print_r($datas);
	}else {
		$actionName = "add";

		/*comme on utilise des valeurs de $datas dans le formulaire 
		et comme on est dans un nouveau produit, alros il faut que 
		je déclare mon tableau datas à vide*/
		$datas['msg_firstname'] = 0;
		$datas['msg_text'] = "";
		$datas['msg_date'] = "";


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
		<form action="./libs/services_products.php?action=<?php echo $actionName;?>" method="post" id="addProduct" enctype="multipart/form-data"> <!-- le type d'encodage du fichier, sans cela, source d'erreur pour envoyer le fichier -->
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152" /> 	<!-- Pour limiter la taille du fichier -->
			<input type="hidden" required="required" name="prId" value="<?php echo $datas['pr_id']; ?>" />
			<input type="hidden" required="required" name="prFilepath" value="<?php echo $datas['pr_image']; ?>" />
			<label for="">Nom du produit</label>
			<input type="text" required="required" name="prName" placeholder="nom de produit" value="<?php echo $datas['pr_name']; ?>" /><br>
			<label for="">Référence du produit</label>
			<input type="text" name="prRef" required="required" placeholder="référence de produit" value="<?php echo $datas['pr_ref']; ?>" /><br>
			<label for="">Prix du produit</label>
			<input type="text" name="prPrice" required="required" placeholder="prix de produit" value="<?php echo $datas['pr_price']; ?>" /><br>
			<label for="">Description du produit</label>
			<textarea name="prDescription" placeholder="description de produit"><?php echo $datas['pr_description']; ?></textarea><br>
			<label for="file"></label>
			<input type="file" name="prImage" accept="image/*" />
			<input type="submit" value="Ajouter un produit" />
		</form>
	</body>
</html>
