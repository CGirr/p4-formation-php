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

    <form action="traitement-modifier.php" method="POST">
        <div class="champ-formulaire">
            <label for="titre">Titre de l'œuvre</label>
            <input type="text" name="titre" id="titre" value ="<?php echo $oeuvre['titre'] ?>">
        </div>
        <div class="champ-formulaire">
            <label for="artiste">Auteur de l'œuvre</label>
            <input type="text" name="artiste" id="artiste" value="<?php echo $oeuvre['artiste'] ?>">
        </div>
        <div class="champ-formulaire">
            <label for="image">URL de l'image</label>
            <input type="url" name="image" id="image" value="<?php echo $oeuvre['image'] ?>">
        </div>
        <div class="champ-formulaire">
            <label for="description">Description</label>
            <textarea name="description" id="description"><?php echo $oeuvre['description'] ?></textarea>
        </div>
        <div>
            <label for="id">identifiant de l'oeuvre</label>
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">
        </div>
        <input type="submit" value="Valider" name="submit">
    </form>

<?php require 'footer.php'; ?>