<?php
require('Classes/Chat.php');

$cat1 = new Chat('Sebastien', 'Sept', 'Brun', 'Mâle', 'Siamois');
$cat2 = new Chat('Bertrand', 7, 'Noir', 'Dinosaure du futur', 'Bombay');
$cat3 = new Chat('Jean Alphonse-Olivier', 7, 'Bleu ciel par une nuit étoilée un mercredi de Mai', 'Femelle', 'Sibérien');

// Des erreurs ont volontairement été glissées en paramètres lors de l'instanciation des chats afin de tester les vérifications effectuées par les setters

$cats = array($cat1, $cat2, $cat3);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exercice 4</title>
	<meta charset="utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>
<body>

    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Âge</th>
                    <th>Couleur</th>
                    <th>Genre</th>
                    <th>Race</th>
                </tr>
            </thead>
            <?php
            foreach($cats as $cat):
            $infos = $cat->getInfos();
            ?>
            <tr>
                <td><?= $infos['name'] ?></td>
                <td><?= $infos['age'] ?></td>
                <td><?= $infos['color'] ?></td>
                <td><?= $infos['gender'] ?></td>
                <td><?= $infos['race'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>

</body>
</html>
