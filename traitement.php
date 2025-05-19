<?php

$postData = $_POST;

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
    default:
}

$titre = htmlspecialchars($postData["titre"]);
$artiste = htmlspecialchars($postData["artiste"]);
$description = htmlspecialchars($postData["description"]);
$image = $postData["image"];

