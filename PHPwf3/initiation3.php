<?php 

function displayGro($text){
	echo "<h3>".$text."</h3>";
}
/* Création d'un objet */

// Tableau
$tab = array('index1'=>"premier index", 'index2'=>'deuxieme index');
$tab['index3'] = "troisieme index";
echo "<pre>";
print_r($tab);
echo "</pre>";

// Instanciation de l'objet: standard class
$obj = (object)$tab;
echo "<pre>";
print_r($obj);
echo "</pre>";

// Appel pour récuperer une valeur à un index d'un tableau 
echo "<br />".$tab['index2']." depuis un tableau";

// Pour récupérer une valeur stockée dans un objet
echo "<br />".$obj->index2." depuis un objet";
// Créer une nouvelle propriété
$obj->index4 = "quatrième index";
echo "<br />".$obj->index4;
echo "<br />";
// Rappel sur les dates
$dateDuJour = date('Y-m-d');
echo "<br />La date du jour : ".$dateDuJour;
// Timestamp, c'est le nombre de secondes depuis le premier janvier 1970
$time = time();
echo "<br />L'heure actuelle en seconde depuis 1970 : ".$time;
// petit site utile http://timestamp.fr

$uneDate = date('Y-m-d', 100);
echo "<br />La date est : ".$uneDate;

// une fonction fmktime permet de convertir une date en timestamp
$timeTemp = mktime(12, 59, 36, 11, 30, 2015);
$uneDate = date('r', $timeTemp);
echo "<br />La date mktime(12, 59, 36, 11, 30, 2015) est :".$uneDate;

// Récupérer la date d'il y a une semaine
$dateSemaineDerniere = mktime(0,0,0,date('m'), date('d')-7, date('Y'));
echo "<br />La date de la semaine dernière est : ".date('Y-m-d', $dateSemaineDerniere);


displayGro("Function Pour Savoir si l'année est bissextile ou pas avec Timestamp");

function isBissextile($annee){

	$timeStampPremJour = mktime(0,0,0,1, 1,$annee);
	$resultat = date('L', $timeStampPremJour);
	
	if(date($resultat) == 1) {
		return "L'année $annee est Bissextile.";
	} else {
		return "L'année $annee n'est pas bissextile.";
	}
}

echo "<br />".isBissextile(2015);
echo "<br />".isBissextile(2012);
echo "<br />".isBissextile(400);

// Tester si une date est valide : Par la suite on peut savoir si l'année est bissextile ou pas avec 29 février
$result = checkdate(2, 29, 400);
echo ($result) ? "<br/>date valable" : "<br/>date non valable" ;

// L'object dateTime
$d = new dateTime();
echo "<pre>";
print_r($d);
echo "</pre>";

print_r("<br/>Je cherche la propriété de date de l'objet DateTime, c'est: ".$d->date);
print_r("<br/>Je cherche la propriété de timezone_type de l'objet DateTime, c'est: ".$d->timezone_type);
print_r("<br/>Je cherche la propriété de timezone de l'objet DateTime, c'est: ".$d->timezone);

// Fonction Sleep
sleep(2);
echo "<pre>";
print_r($d);
echo "</pre>";


$d2 = new dateTime();
echo "<pre>";
print_r($d2);
echo "</pre>";

$d3 = new dateTime();

$fuseauParis = new DateTimeZone('Europe/Paris');
$d3->setTimezone($fuseauParis);
echo "<pre>Paris<br />";
print_r($d3);
echo "</pre>";


$fuseauLondres = new DateTimeZone('Europe/London');
$d3->setTimezone($fuseauLondres);
echo "<pre>Londres<br />";
print_r($d3);
echo "</pre>";

$fuseauJapan = new DateTimeZone('Asia/Tokyo');
$d3->setTimezone($fuseauJapan);
echo "<pre>Japan<br />";
print_r($d3);
echo "</pre>";


$fuseauNY = new DateTimeZone('America/New_York');
$d3->setTimezone($fuseauNY);
echo "<pre>New York<br />";
print_r($d3);
echo "</pre>";


?>