<?php
try
{
    $mysqlClient = new PDO(
        'mysql:host=localhost:3306;dbname=artbox;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>