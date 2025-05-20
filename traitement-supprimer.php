<?php
require 'connect.php';

$id = $_POST['id'];

$sqlQuery = 'DELETE FROM oeuvres WHERE id = :id';

/** @var $mysqlClient */
$deleteOeuvre = $mysqlClient->prepare($sqlQuery);
$deleteOeuvre->execute([
    ':id' => $id,
]);

header('Location: index.php');