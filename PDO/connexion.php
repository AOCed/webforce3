<?php 
function displayH2($text){
	echo "<h2>".$text."</h2>";
}
function displayH3($text){
	echo "<h3>".$text."</h3>";
}

$online = false; // valeur true ou false;

if ($online) {
	// Pour mettre les informations lorsque le serveur est à distance
	$server = "";
	$login = "";
	$password = "";
	$dbName = ""; // Mettre le nom de la base de donnée 
} else {
	$server = "localhost";
	$login = "root";
	$password = "";
	$dbName = "minisite"; // Mettre le nom de la base de donnée 
}

try {
	$connection = new PDO('mysql:host='.$server.';dbname='.$dbName,$login,$password); // 1er paramètre le nom du serveur, ensuite nom de db, login, password
}
catch(Exception $e) {
/*	echo "<pre>";
	print_r($e);
	echo "</pre>";*/
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N° : '.$e->getCode().'<br />';
};

 displayH2("Deux types de commandes: exec et query");
/* Deux types de commandes:
	soit "exec" pour INSERT, UPDATE et DELETE 
	soit "query" pour SELECT */
// Exec
$connection->exec("UPDATE products SET pr_name='Nov le chat' WHERE pr_id=8 ");

$nbElementAffectes = $connection->exec("UPDATE products SET pr_description='un description pour tout le monde' ");
echo "la requete a affecté ".$nbElementAffectes." lignes.<br />";
// Query
$sql = "SELECT * from products";
$resultats = $connection->query($sql);


displayH3("Sous forme d'objet");
// Dire sous quelle forme on récupère les résultats

	// Ici sous forme d'objet
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	// Parcourir les résultats 
	while($datas = $resultats->fetch()) {
		echo "<br />nom produits = ".$datas->pr_name." et son prix = ".$datas->pr_price;
	}

	echo "<br>";
displayH3("Sous forme de tableau");
// Dire sous quelle forme on récupère les résultats
	$sql = "SELECT * from products";
	$resultats = $connection->query($sql);
	// Dire sous quelle forme on récupère les résultats
	// Ici sous forme de tableau
	$resultats->setFetchMode(PDO::FETCH_ASSOC);
	// Parcourir les résultats 
	while($datas = $resultats->fetch()) {
		echo "<br />nom produits = ".$datas['pr_name']." et son prix = ".$datas['pr_price'];
	}

// Methode "prépare"
 displayH2("Methode Prepare");

// Preparer notre requete
$reqPrepare = $connection->prepare("SELECT pr_name FROM products ORDER BY pr_name ASC");

//Executer la requete
$reqPrepare->execute();
while($datas = $reqPrepare->fetch(PDO::FETCH_OBJ)){
	echo "<br /> Nom produit = ".$datas->pr_name;
}

displayH3("préparation d'une requete avec variable identifiée ");
// Préparer une requête générique avec des "variables identifiées"
$reqPrepare = $connection->prepare("SELECT pr_name FROM products WHERE pr_id= :id");
// Executer la requête en lui passant la valeur de la variable attendue
$reqPrepare->execute(array('id'=>8));
$datas = $reqPrepare->fetch(PDO::FETCH_OBJ);
echo "<br />Le nom produit = ".$datas->pr_name;


displayH3("préparation d'une requete avec variable non identifiée ");
// Préparer une requête générique avec des "variables non identifiées"
$reqPrepare = $connection->prepare("SELECT pr_name FROM products WHERE pr_id= ?");
// Executer la requête en lui passant la valeur de la variable attendue
$reqPrepare->execute(array(8));
$datas = $reqPrepare->fetch(PDO::FETCH_OBJ);
echo "<br />Le nom produit = ".$datas->pr_name;

displayH3("Insert avec PDO et Prepare et variable");

/*$sql= "INSERT INTO products(pr_name, pr_ref, pr_price, pr_description) VALUES (:name, :ref, :price, :description)";
$reqPrepare = $connection->prepare($sql);
// Executer la requête en lui passant la valeur de la variable attendue
$reqPrepare->execute(array(
	"name"=> "test2",
	"ref"=> "test2",
	"price"=> 25,
	"description"=> "Jen sais rien",
	));
*/

// Pour obtenir l'ID par votre requête 
echo $connection->lastInsertId();

$reqPrepare = $connection->prepare("SELECT pr_name FROM products WHERE pr_id= ?");
// Executer la requête en lui passant la valeur de la variable attendue
$reqPrepare->execute(array(39));
$datas = $reqPrepare->fetch(PDO::FETCH_OBJ);
echo "<br />Le nom produit = ".$datas->pr_name;

// Une autre manière d'insérer avec ?
/*$sql= "INSERT INTO products(pr_name, pr_ref, pr_price, pr_description) VALUES (?, ?, ?, ?)";
$reqPrepare = $connection->prepare($sql);
// Executer la requête en lui passant la valeur de la variable attendue
$reqPrepare->execute(array(
	"test3",
	"test3",
	 35,
	"Jen sais rien non plus"
	));*/

displayH3('Plusieurs inserts à la fois');
// Inserer plusieurs inserts à la suite
$sql= "INSERT INTO products(pr_name, pr_ref, pr_price, pr_description) VALUES (:name, :ref, :price, :description)";
$reqPrepare = $connection->prepare($sql);
$reqPrepare->bindParam(':name', $name);
$reqPrepare->bindParam(':ref', $ref);
$reqPrepare->bindParam(':price', $prix);
$reqPrepare->bindParam(':description', $description);
// $reqPrepare->bindParam(':image', $image);

// Ensuite pour insérer une ligne
$name = "toto";
$ref = "ref à toto";
$prix = 151;
$description = "description à toto";
$image = "image à toto";

$reqPrepare->execute();
// insérer une autre ligne
$name = "titi";
$ref = "ref à titi";
$prix = 152;
$description = "description à titi";
$reqPrepare->execute();


?>