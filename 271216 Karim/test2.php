<?php 
if (!empty($_POST['number1'] && $_POST['number2']) ) {
	$firstN = $_POST['number1'];
	$secondN = $_POST['number2'];
	$result1 = array();
	$result2 = array();

	for ($i=2; $i < $firstN; $i++) { 
		if ($firstN%$i == 0) {
			$result1[] = $i;
		}
	}
	for ($i=2; $i < $secondN; $i++) { 
		if ($secondN%$i == 0) {
			$result2[] = $i;
		}
	}


	$result3 = array_intersect($result1, $result2);
	$nombreResult3 = count($result3);
	// $minResult1 = min($result3);
	// echo $nombreResult3;

/*	echo "<pre>";
	print_r($result1);
	print_r($result2);
	echo "</pre>";*/

	if ($nombreResult3 > 0) {
		echo "Le dénominateur le plus petit en commun entre ".$firstN." et".$secondN." est ".min($result3)."<br />";
	}

/*	if (in_array($result1, $result2)) {
		echo "utilisant deuxieme méthode pour trouver le dénominateur plus petit en commun ".$minResult1;
	} else {
		echo "Y a pas de dénominateur commun entre ".$firstN." et".$secondN;
	}*/
	$res = "";
	foreach ($result1 as $value ) {
		if (in_array($value, $result2)) {
			$res = $value;
			break;
		}
	}
	if ($res != "") {
		echo "En utilisant deuxieme méthode pour trouver le dénominateur plus petit en commun ".$res;
	} else {
		echo "Y a pas de dénominateur commun entre ".$firstN." et".$secondN.".";
	}

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" name="numbers" method="post">
		<input type="number" name="number1" value="" />
		<input type="number" name="number2" value="" />
		<input type="submit" />		
	</form>
</body>
</html>