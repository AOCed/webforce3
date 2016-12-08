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
function addGrasToString($chaine){
	return "<strong>".$chaine."</strong>";
}


// Calendrier chinois

function maSigneChinois($annee) {

	$signeChinois = array('Singe', 'Coq', 'Chien', 'Cochon', 'Rat', 'Buffle', 'Tigre', 'Lapin', 'Dragon', 'Serpent', 'Cheval', 'Chèvre');
	$index = $annee%12;

	// si les gens entrent l'année en négatif...
	// if ($index < 0) $index += 12;
	
	return "Le signe zodiaque de votre année de naissance ".$annee." est ".addGrasToString($signeChinois[$index]).".";
		
}

function aireRectagle($lar, $lon) {
	$aire = $lar * $lon;
	return "l'aire du rectagle de largeur et de longueur que vous avez saisi est ".$aire.".";
}

function bissextile($annee){
	if (($annee%4 == 0 && $annee%100 !=0) || $annee%400 ==0) {
		return "Oui, c'est une année bissextile.";
	} else {
		return "Non, c'est pas une année bissextile.";
	}
} 




// Fonctions récursives 
function displayH1ToH5($chaine, $h=0){
	
}


?>
