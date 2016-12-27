<?php

$monNom = "hwa-seon";

$monNomTab = str_split($monNom);

print_r($monNomTab);
echo "<br />";
$reMonNom = implode(" ", $monNomTab);
echo $reMonNom."<br />";

for ($i=0; $i < count($monNomTab); $i++) { 
	echo $monNomTab[$i];
}
echo "<br />";
for ($i=(count($monNomTab)-1); $i>=0; $i--) { 
	echo $monNomTab[$i];
}


?>