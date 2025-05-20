<?php
require 'connect.php';

$postDataUpdate = $_POST;
$id = $postDataUpdate['id'];

/** On utilise strip_tags pour empêcher l'utilisateur d'injecter du code JavaScript  */
$titreUpdate = strip_tags($postDataUpdate["titre"]);
$artisteUpdate = strip_tags($postDataUpdate["artiste"]);
$descriptionUpdate = strip_tags($postDataUpdate["description"]);
$imageUpdate = $postDataUpdate["image"];

/** On modifie l'œuvre en base de données */
/** Écriture de la requête */
$sqlQuery = 'UPDATE oeuvres SET titre = :titre, artiste = :artiste, description = :description, image = :image WHERE id = :id';

/** Préparation */
/** @var $mysqlClient */
$updateOeuvre = $mysqlClient->prepare($sqlQuery);

/** Exécution de la requête */
$updateOeuvre->execute([
    'titre' => $titreUpdate,
    'artiste' => $artisteUpdate,
    'description' => $descriptionUpdate,
    'image' => $imageUpdate,
    'id' => $id,
]);

header('Location: oeuvre.php?id='.$id);