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
}

/** On utilise strip_tags pour empêcher l'utilisateur d'injecter du code JavaScript  */
$titre = strip_tags($postData["titre"]);
$artiste = strip_tags($postData["artiste"]);
$description = strip_tags($postData["description"]);
$image = $postData["image"];

