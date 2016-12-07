<?php 

function displayGros($txt){
	echo "<h1>".$txt."</h1>";
}

// Pour pouvoir utiliser une fonction, il faut le déclarer avant

function helloWorld(){
	echo "<br>Hello world";
}

function helloWorld2(){
	return "<br>Hello world2";
}

// Les Paramètres
function addBrToString($chaine) {
	return "<br>".$chaine;
}
// On peut passer un paramètre
function addH2ToString($chaine="valeur par défaut") {
	return "<h2>".$chaine."</h2>".addHToString3("fonction dans une fonction", 4);
}
// On peut avoir  une valeur par défaut pour paramère qui sera utilisé si on ne définit pas le paramètre
function addH2ToString2($chaine="valeur défaut") {
	return "<h2>".$chaine."</h2>";
}
//On peut passer plusieurs paramètres, faut séparer par une virgule
function addHToString3($chaine="valeur défaut", $number) {
	return "<h".$number.">".$chaine."</h".$number.">";
}

// Calendrier chinois



function maSigneCalChinois($annee) {

	$signeChinois = array('singe', 'coq', 'chien', 'cochon', 'rat', 'buffle', 'tigre', 'lapin', 'dragon', 'serpent', 'cheval', 'chèvre');
	$index = $annee%12;

	if($index < 0) {
		$index += 12; 
	}
	
	return $signeChinois[$index];
		
}





// Fonctions récursives 
function displayH1ToH5($chaine, $h=0){
	
}


?>
