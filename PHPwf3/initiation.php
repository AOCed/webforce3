<?php 	
/**
* affiche un titre dans un <h2>
*
* @param string $txt
*
* @return html
**/
function displayTitle2($txt){
	echo "<h2>".$txt."</h2>";
}

// c'est mon premier commentaire en PHP
/**
* Première Partie de mon code
**/


displayTitle2("Echo d'une chaine");

	echo "Bonjour, Monde !";
	echo "<br>citation: \"ceci est une citation.\" - moi-même "; 


displayTitle2("Les Variables et Concaténation");
/**
* Les Variables
**/ 

	$myName = "Hwa-seon";
	$mon_age = 23;
	$jeSuisUnHomme = true; // type booleen

/**
* Concaténation
**/ 
	echo "Hello, " . $myName . "! Bienvenue!\n";  // J'affiche hello, world avec mon nom
	echo $jeSuisUnHomme;;

/**
* On peut redéfinir une variable à tout moment
**/ 

	$mon_age = 35;

	echo "<br />".$mon_age;

	$anneeNaissanceMere = 1955;
	$anneeNaissanceMoi = 1981;

	$age = $anneeNaissanceMoi - $anneeNaissanceMere;
	echo "<br />".$age;

	echo $age+1;

displayTitle2("Calcul particulier sur les variables");

/**
* CALCULS PARTICULIERS SUR LES VARIABLES
**/ 

	$ageDuCapitaine = 50;
	// Pour augmenter de 1 on a plusieurs possibilités
	$ageDuCapitaine = $ageDuCapitaine+1;
	echo "<br />Le capitaine a ".$ageDuCapitaine." ans!";
	$ageDuCapitaine += 1;
	echo "<br />Le capitaine a ".$ageDuCapitaine." ans!";
	$ageDuCapitaine ++;
	echo "<br />Le capitaine a ".$ageDuCapitaine." ans!";

/**
* Concatenation particulière
**/ 
	$html = "";
	// ajouter début balise h1
	$html .= "<h1>";
	// ajouter du texte
	$html = $html."mon titre 1";
	// ajouter fin balise h1
	$html .= "</h1>";
	echo $html;


displayTitle2("Tableaux et listes");
/**
* Les Tableaux ou listes
**/ 
	$monTab = array(); // Créer un tableau vide	
	$monTab2 = array("pommes", "poire", 23.5, );// Créer  un tableau avec des valeurs
	// pour Débuggagen, on peut afficher le contenu dans le tableau avec 
	// <pre> montre le contenu tel qu'il est
	echo "<pre>";
	print_r($monTab2);
	echo "</pre>";


	$monTab3 = array("chiens", "chats", $monTab2);

	echo "<pre>";
	print_r($monTab3);
	echo "</pre>";

	// pour récup une valeur d'un tableau

	echo "<pre>";
	print_r($monTab3[2][1]);
	echo "</pre>";

	// Changer la valeur d'un index particulier

	$monTab3[2][1] = "banane";

	echo "<pre>";
	print_r($monTab3[2]);
	echo "</pre>";

	// Ajouter une valeur en fin de tableau 

	$monTab3[] = "papillon";
	array_push($monTab3, "ananas");

	echo "<pre>";
	print_r($monTab3);
	echo "</pre>";

displayTitle2("Tableaux indexés");

/**
* Les Tableaux Indexes
**/ 
	$monTab3[100] = "coucou";

	echo "<pre>";
	print_r($monTab3);
	echo "</pre>";

	$user1 = array("nom"=>"Dupont", "prenom"=>"Super", "age"=>82);
	echo "<pre>";
	print_r("user1");
	print_r($user1["nom"]);
	echo "</pre>";

	$user2 = array("nom"=>"Gai", "prenom"=>"Luron", "age"=>28);

	$users = array($user1, $user2);
	print_r("user1");

	echo "<pre>";
	print_r($users);
	print_r($users[1]["prenom"]);
	echo "</pre>";

/**
* IF THEN ELSE
**/ 
displayTitle2('Conditions: If Then Else');

	$isMale = true;

	if($isMale==true){
		echo "<br>Je suis un homme.";
	} else {
		echo "<br>Je suis une femme.";
	}
	// Autre manière d'écrire la même chose
	$isMale = false;
	if($isMale){
		echo "<br>Je suis un homme.";
	} else {
		echo "<br>Je suis une femme.";
	}
	// Facon Negative
	if(!$isMale){
		echo "<br>Je suis un homme.";
	} else {
		echo "<br>Je suis une femme.";
	}
	if($isMale!=true){
		echo "<br>Je suis un homme.";
	} else {
		echo "<br>Je suis une femme.";
	}

	// Pourquoi il existe === 
	$isMale = 1;
	if($isMale === true){
		echo "<br>- Je suis un homme.";
	} else {
		echo "<br>- Je suis une femme.";
	}

/**
* Switch Case
**/ 
displayTitle2("Switch Case");

$animal = "licorne";
if ($animal == "cheval") {
	echo "<br> Je suis un cheval.";
} else if ($animal == "lapin") {
	echo "<br> Je suis un lapin.";
} else if ($animal == "poule") {
	echo "<br> Je suis une poule.";
} else if ($animal == "licorne") {
	echo "<br> Je suis une licorne.";
} else {
	echo "<br>Je suis un animal que je ne connais pas";
}

// Ca s'écrit normalement comme ca.
switch($animal) {
	case "cheval":
		echo "<br> Je suis un cheval.";
	break;
	case "lapin":
		echo "<br> Je suis un cheval.";
	break;
	case "poule":
		echo "<br> Je suis une poule.";
	break;
	case "licorne":
		echo "<br> Je suis Sonny.";
	break;
	default :
		echo "<br> Je suis un animal que je ne connais pas";
	break;
}

switch($animal) {
	case "cheval":
	case "licorne":
		echo "<br> Je suis gros.";
	break;
	case "lapin":
	case "poule":
		echo "<br> Je suis petit.";
	break;
	default :
		echo "<br> Je suis un animal que je ne connais pas";
	break;
}

if ($animal == "cheval" || $animal == "licorne") {
	echo "<br> Je suis gros.";
} else if ($animal == "lapin" || $animal == "poule") {
	echo "<br> Je suis petit.";
} else {
	echo "<br> Je suis un animal que je ne connais pas.";
}


// Manière d'écrire une condition en une ligne 
$animal = "lapin";
echo ($animal == "lapin")? "<br>Je suis un lapin" : "<br>Je suis pas un lapin";

$poids = 150;

$grosOuPetit = ($poids >100)? "gros" : "maigre";
echo "<br>Je suis ".$grosOuPetit;





?> 

	

