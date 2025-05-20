<?php
require 'connect.php';

$postData = $_POST;
$error = null;

/** On valide les données reçues par le formulaire  */
switch ($postData) {
    case empty($postData["titre"]):
        $error = 1;
        break;
    case empty($postData["artiste"]):
        $error = 2;
        break;
    case strlen($postData["description"]) < 3:
        $error = 3;
        break;
    case !filter_var($postData["image"], FILTER_VALIDATE_URL):
        $error = 4;
        break;
    default:
        /** On utilise strip_tags pour empêcher l'utilisateur d'injecter du code JavaScript  */
        $titre = strip_tags($postData["titre"]);
        $artiste = strip_tags($postData["artiste"]);
        $description = strip_tags($postData["description"]);
        $image = $postData["image"];

        /** On insère la nouvelle œuvre en base de données */
        /** Écriture de la requête */
        $sqlQuery = 'INSERT INTO oeuvres (titre, artiste, description, image) VALUES(:titre, :artiste, :description, :image)';

        /** Préparation */
        /** @var $mysqlClient */
        $insertOeuvre = $mysqlClient->prepare($sqlQuery);

        /** Exécution de la requête */
        $insertOeuvre->execute([
            'titre' => $titre,
            'artiste' => $artiste,
            'description' => $description,
            'image' => $image,
        ]);

        $idOeuvre = $mysqlClient->lastInsertId();
}

if ($error != null) {
    header('location: ajouter.php?erreur='.$error);
} else {
    header('Location: oeuvre.php?id='.$idOeuvre);
}
