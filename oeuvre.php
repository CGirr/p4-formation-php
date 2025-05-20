<?php
    require 'header.php';
    require 'connect.php';

    /** @var $mysqlClient */

    /** Préparation de la requête SQL */
    $oeuvreStatement = $mysqlClient->prepare('SELECT id, titre, description, artiste, image FROM oeuvres WHERE id = ?');

    /** Exécution de la requête SQL */
    $oeuvreStatement->execute([$_GET['id']]);

    /** Récupération de l'œuvre */
    $oeuvre = $oeuvreStatement->fetch();

    if(empty($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
        <div class="link-container">
            <a href="supprimer.php?id=<?= $oeuvre['id'] ?>" class="link-danger">Supprimer l'oeuvre</a>
            <div>|</div>
            <a href="modifier.php?id=<?= $oeuvre['id'] ?>" class="link-edit">Modifier l'oeuvre</a>
        </div>
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
