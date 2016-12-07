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
displayTitle2("07 DEC 2016");
displayTitle2("Conditions - suite");

$age = 15;
$sexe = "M"; // soit M soit F

if ($age < 18 && $sexe = "M") {
	echo "<br>Je suis un jeune garcon mineur.";
} else if ($age < 18 && $sexe = "F") {
	echo "<br>Je suis une jeune fille mineure.";
} else if ($age >= 18 && $sexe = "M") {
	echo "<br>Je suis un homme majeur.";
} else if ($age >= 18 && $sexe = "F") {
	echo "<br>Je suis une femme majeure.";
}

// Imbrication de la condition dans une condition

$age = 15;
$sexe = "F"; // soit M soit F

if ($sexe=="M") {
	if ($age < 18) {
		echo "<br>Je suis un jeune garcon mineur.";
	} else {
		echo "<br>Je suis un homme majeur.";
	}
} else {
	if ($age < 18) {
		echo "<br>Je suis une jeune fille mineure.";
	} else {
		echo "<br>Je suis une femme majeure.";
	}
}

// Condition avec textes contacténés.

if ($sexe == "M") {
	$genre = "un homme";
	// $terminaison = "";
} else {
	$genre = "une femme";
	//$terminaison = "e";
}

if ($age < 18) {
	$majeurMineur = ($sexe=="M")? "mineur": "mineure";
} else {
	$majeurMineur = ($sexe=="M")? "mineur": "mineure";
}

// echo "<br>Je suis ".$genre." ".$majeurMineur.".".$terminaison;
echo "<br>Je suis ".$genre." ".$majeurMineur.".";

/**
* Les Constantes
**/
displayTitle2("Les Variables Constantes");
// C'est comme une variable mais que l'on ne peut définir qu'une seule fois.
// Par convention, toujours en majuscules
// Obligation, pas d'espace, pas d'accents
Define ('NOM_DU_CLIENT', 'Client A');

echo '<br>Le site appartient au '.NOM_DU_CLIENT;

/**
* Les Constantes "magiques"
**/
// http://php.net/manual/fr/language.constants.predefined.php

displayTitle2("Les Constantes Magiques");

echo "<br>".__DIR__;
echo "<br>".__FILE__;


/**
* Les Boucles"
**/
displayTitle2("Les Boucles");
//la boucle FOR 

for ($i=0; $i <15 ; $i++) { 
	echo "<br>".$i;
}

displayTitle2("La Boucle FOR");
$animaux = array('poule', 'vache', 'mouton', 'cheval');

for ($i=0; $i < count($animaux); $i++) { 
	if($i==0) echo "<br> Voici la liste de mes animaux: ";
	echo "<br>".$animaux[$i];
	if($i==count($animaux)-1) echo "<br>C'est la fin de ma liste. ";
}


$animaux = array('poule', 'vache', array('chat', 'chien', 'tigre'), 'cheval');

for ($i=0; $i < count($animaux); $i++) { 
	if (is_array($animaux[$i])) {
		for ($j=0; $j < count($animaux[$i]) ; $j++) { 
			echo "<br>".$animaux[$i][$j];
		}
	} else {
		echo "<br>".$animaux[$i];
	}
}

$compteur = 0;
while ($compteur < 7) {
	echo "<br> le compteur est égal à ".$compteur;
	$compteur += 2;
}

displayTitle2("Boucle FOREACH ");
// la boucle foreach
$animaux = array('poule', 'vache', 'mouton', 'cheval');

foreach ($animaux as $value) {
	echo "<br>".$value;
}

$animaux[] = 'chochon';
$animaux[100] = 'canard';

foreach ($animaux as $value) {
	echo "<br>".$value;
}

$user1 = array (
	'nom' => 'toto',
	'prenom' => 'titi',
	'age' => 35
);
	echo "<br>C'est user1:";
foreach ($user1 as $key => $value) {
	echo "<br>".$key."=>".$value;
}


$user2 = array (
	'nom' => 'Wayne',
	'prenom' => 'Bruce',
	'age' => 30
);

	echo "<br>C'est user2:";
foreach ($user2 as $key => $value) {
	echo "<br>".$key." = ".$value;
}

displayTitle2("Double Boucle FOREACH ");
$listeUsers = array($user1, $user2);
foreach ($listeUsers as $v) { 
	foreach ($v as $k => $value) {
		echo "<br>".$k." = ".$value;
	}
}

// boucle do while
displayTitle2("Boucle DO WHILE ");
$cpt = 1;
do {
	echo "<br>".$cpt;
	$cpt++;
} while ($cpt <6);

// Pour attribuer la meme valeur à plusieurs variable en mm temps

$a = $b = $c = 10;

$b = ++$a;


echo "<br>".$a."|".$b."|".$c;

// Passer d'une chaine de caractère en tableau et inversement

$chaine = "1,2,3,4,5,6,7,8,9,toto,titi";

$tableauDeMaChaine = explode(',', $chaine);

echo $chaine."<br>";
print_r($tableauDeMaChaine);
$tableauDeMaChaine[1] = "666";
$chaine = implode(";", $tableauDeMaChaine);
echo "<br>".$chaine."<br>";

$devil = "666";
$devil++;
echo "<br>".$devil;

$angel = 777;
$angel .= "toto";
echo "<br>".$angel;

/**
* Les Boucles"
**/
displayTitle2("Quelques traitements sur les chaines");

// Intval va retourner la valeur numérique entière de ce qu 'on lui passe en paramètre
echo "<br>".intval('042');

// passer toute ma chaine en majuscule

$chaine = "Bonne nuit les petits éléphants";
echo "<br>".strtoupper($chaine);

// pour les accents
echo "<br>".mb_strtoupper($chaine, "UTF-8");

// passer toute la chaien en miniscule
$chaine = "WARNING !!!!";
echo "<br>".strtolower($chaine);

// Supprimer les espaces devant et derrière une chaine

$chaine = "   plein d'espaces     ";
echo "<br>|".$chaine."|";
$chaine = trim($chaine);
echo "<br>|".$chaine."|";

$chaine = "esplein d'espaces";
echo "<br>|".$chaine."|";
$chaine = rtrim($chaine, "es");
echo "<br>|".$chaine."|";
$chaine = ltrim($chaine, "es");
echo "<br>|".$chaine."|";

// savoir si une chaine est présente dans une autre chaine
$chaine = "Bonne nuit les petits éléphants";
$chaineAtrouver = "petits";

echo "<br>------- ".strpos($chaine, $chaineAtrouver);
$chaineAtrouver = "Bonne";
echo "<br>------- ".strpos($chaine, $chaineAtrouver);
echo "<br>------- ".strpos($chaine, 'titi');

if (strpos($chaine, 'titi')!==false) {
	echo "<br> chaine trouvée";
} else {
	echo "<br> chaine non-trouvée";
}

// Remplacer toutes les occurences d'une chaine
echo "<br>".str_replace("nuit", "journée", $chaine);
echo "<br>".str_replace("petits", "gros", $chaine);

// compter le nombre de chaine de caractère
echo "<br>Cette chaine contient ".strlen($chaine)." de caractère.";


?> 

	

