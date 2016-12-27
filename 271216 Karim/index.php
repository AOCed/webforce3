<?php 


if(!empty($_POST['number'])){

	$numberToTest = $_POST['number'];
	$isPremier = true;

	for ($i=2; $i < $numberToTest; $i++) { 
		if ($numberToTest%$i == 0) {
			$isPremier = false;
			break;
		}
	}

	if($isPremier == true) {
		echo $numberToTest." est un nombre premier";
		} else {
		echo $numberToTest."n'est pas un nombre premier.";
	}

} else {
	$numberToTest = "";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" name="number" method="post">
		<input type="number" name="number" value="<?php echo $numberToTest;?>" />
		<input type="submit" />
	</form>
</body>
</html>

