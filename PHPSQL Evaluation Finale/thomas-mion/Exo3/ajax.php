<?php

require_once 'connect.php';

if (!empty($_POST)) {
    // On va créer un tableau dans lequel on insèrera autant d'éléments qu'il y a de champs dans notre formulaire
    foreach ($_POST as $key => $value){
        $post[$key] = strip_tags(trim($value));
    }

    // On va ensuite initialiser un tableau pour gérer nos erreurs.
    $errors = array();

    /* DevNote */
    // Pour chaque champ du formulaire, on vérifie si ce qu'a renseigné l'utilisateur est correct ou non. En cas d'erreur, on ajoute un message d'erreur dans notre tableau des erreurs
    if (strlen($post['brand']) < 3) {
        $errors[] = 'Le nom de la marque doit comporter au moins <strong>3</strong> caractères';
    } elseif (strlen($post['brand']) > 50) {
        $errors[] = 'Le nom de la marque ne peut pas comporter plus de <strong>50</strong> caractères';
    }

    if (strlen($post['model']) < 3) {
        $errors[] = 'Le nom du modèle doit comporter au moins <strong>3</strong> caractères';
    } elseif (strlen($post['model']) > 50) {
        $errors[] = 'Le nom du modèle ne peut pas comporter plus de <strong>50</strong> caractères';
    }

    if (empty($post['year'])) {
        $errors[] = 'Il faut renseigner l\'année';
    } elseif ($post['year'] < 1900) { // Car tout le monde sait que l'invention de la première voiture remonte à 1900, non ? Non ? Tant pis
        $errors[] = 'Vous ne pouvez pas remonter le temps autant';
    } elseif ($post['year'] > (date("Y") + 1)) { // Au cas où l'utilisateur ait besoin de rentrer une voiture qui ne sortira que l'année prochaine, grand maximum
        $errors[] = 'Vous ne pouvez pas rentrer une date au-delà de l\'année prochaine';
    }

    if (strlen($post['color']) < 3) {
        $errors[] = 'Le nom de la couleur doit comporter au moins <strong>3</strong> caractères';
    } elseif (strlen($post['color']) > 50) {
        $errors[] = 'Le nom de la couleur ne peut pas comporter plus de <strong>50</strong> caractères';
    }

    // Si le tableau des erreurs est vide, alors on procède à la requête
    if (!count($errors)) {
        $sql = 'INSERT INTO cars (brand, model, year, color) VALUES(:brand, :model, :year, :color)';

        $insertCar = $db->prepare($sql);
        $insertCar->bindValue(':brand', $post['brand']);
        $insertCar->bindValue(':model', $post['model']);
        $insertCar->bindValue(':year', $post['year']);
        $insertCar->bindValue(':color', $post['color']);

        if ($insertCar->execute()){
            $lastId = $db->lastInsertId();

            $classes  = 'alert alert-success';
            $response = 'Votre <strong>' . $post['brand'] .  ' ' . $post['model'] . '</strong> a bien été enregistrée';
        } else {
            $classes  = 'alert alert-danger';
            $response = 'Erreur SQL';
        }
    } else { // Sinon, s'il y a des erreurs, on les affiche
        $classes  = 'alert alert-danger';
        $response = implode('<br>', $errors);
    }
} else { // Sinon, si le formulaire a été envoyé vide
    $classes  = 'alert alert-danger';
    $response = 'Vous devez remplir le formulaire avant de l\'envoyer';
    // Même si techniquement comme il y a un <select> pré-rempli par défaut, il est impossible d'avoir une variable $_POST vide sans s'amuser à supprimer le select via l'inspecteur
}

$queryCars = $db->prepare('SELECT * FROM cars ORDER BY brand, model, year');
if ($queryCars->execute()) {
    $cars = $queryCars->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="<?= $classes ?>"><?= $response ?></div>

<table class="table">
    <thead>
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Année</th>
            <th>Couleur</th>
        </tr>
    </thead>
    <?php foreach($cars as $car): ?>
    <tr <?php if (!empty($lastId) && $car['id'] == $lastId): ?> class="newest" <?php endif; ?>>
        <td><?= $car['brand'] ?></td>
        <td><?= $car['model'] ?></td>
        <td><?= $car['year'] ?></td>
        <td><?= $car['color'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
