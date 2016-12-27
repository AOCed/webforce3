<?php 

if(!empty($_GET['action'])) {
	switch ($_GET['action']) {
		case 'primeNumber':
			primeNumber($_POST['number']);
			break;
		
		default:
			header('Location: index.php');
			break;
	}
}


function primeNumber($number) {
	$number = $_POST['number'];

	$isPremier = true;

	if (!empty($number)){

		for ($i=1; $i < $number ; $i++) { 
			if ($number%$i == 0) {
			 	$isPremier = false;
			 	break;
			} 
		} 
	} 
	return $isPremier;

	if ($isPremier == true) {
		echo "C'est un nombre premier.";
	} else {
		echo "Ce n'est pas un nombre premier.";
	}
}
?>