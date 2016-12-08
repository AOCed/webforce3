<?php 

// Include, ca insert la page appelée dans la page courante
//include('./fonction07dec.php');

// Include_once ca ne récupère le fichier qu'une seule fois;
//include_once('./fonction07dec.php');

// Require et Require_once est utilisé pour une obligation de récupérer le fichier
require('./fonction07dec.php');
//require_once('./fonction07dec.php');

displayGros("Entrée à la Fonction");

helloWorld();
$hello = helloWorld2();
echo $hello;

echo addBrToString("Ceci est une chaine avec br.");
echo addH2ToString("Ceci est une chaine en h2.");
echo addH2ToString2("test");
echo addHToString3("test", 3);
echo displayH1ToH5("TEST", 5);
echo maSigneCalChinois(1955);

?>