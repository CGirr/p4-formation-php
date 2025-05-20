<?php require 'header.php';

$error = $_GET['erreur'] ?? null;

switch ($error) {
    case 1:
        $message = "Veuillez saisir un titre";
        break;
    case 2:
        $message = "Veuillez saisir un nom d'artiste";
        break;
    case 3:
        $message = "Veuillez saisir au moins 3 caractères pour la description";
        break;
    case 4:
        $message = "Veuillez saisir une URL d'image valide";
        break;
}
        if($error !== null){ ?>
<div>
    <p><?php echo($message) ?></p>
</div>
<?php } ?>
<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input type="text" name="titre" id="titre">
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste">
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="text" name="image" id="image">
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'footer.php'; ?>
