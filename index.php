<?php
    require 'header.php';
    require 'connect.php';
?>

<div id="liste-oeuvres">
    <?php

    /** @var PDO $mysqlClient */

    $sqlQuery = "SELECT * FROM `oeuvres`";

    foreach($mysqlClient->query($sqlQuery) as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
