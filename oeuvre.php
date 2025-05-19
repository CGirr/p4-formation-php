<?php
    require 'header.php';
    require 'connect.php';

    /** @var $mysqlClient */

    $oeuvreStatement = $mysqlClient->prepare('SELECT titre, description, artiste, image FROM oeuvres WHERE id = ?');
    $oeuvreStatement->execute([$_GET['id']]);
    $oeuvre = $oeuvreStatement->fetch();

    if(empty($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
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
