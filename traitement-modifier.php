<?php
require 'connect.php';

$postData = $_POST;
$id = $postData["id"];

/** On valide les données reçues par le formulaire  */
switch ($postData) {
    case empty($postData["titre"]):
        echo "Veuillez saisir un titre";
        break;
    case empty($postData["artiste"]):
        echo "Veuillez saisir un nom d'artiste";
        break;
    case strlen($postData["description"]) < 3:
        echo "Veuillez saisir au moins 3 caractères pour la description";
        break;
    case !filter_var($postData["image"]):
        echo "Veuillez saisir une URL d'image valide";
        break;
}

/** On utilise strip_tags pour empêcher l'utilisateur d'injecter du code JavaScript  */
$titre = strip_tags($postData["titre"]);
$artiste = strip_tags($postData["artiste"]);
$description = strip_tags($postData["description"]);
$image = $postData["image"];

/** On insère la nouvelle œuvre en base de données */
/** Écriture de la requête */
$sqlQuery = 'UPDATE oeuvres SET titre = :titre, artiste = :artiste, description = :description, image = :image WHERE id = :id';

/** Préparation */
/** @var $mysqlClient */
$updateOeuvre = $mysqlClient->prepare($sqlQuery);

/** Exécution de la requête */
$updateOeuvre->execute([
    'titre' => $titre,
    'artiste' => $artiste,
    'description' => $description,
    'image' => $image,
    'id' => $id,
]);

header('Location: index.php');