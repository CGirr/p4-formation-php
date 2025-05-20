<?php
require 'header.php';
require 'connect.php';
?>

<div>
    <p>Souhaitez-vous réellement supprimer cette oeuvre ? Cette action est irréversible.</p>
    <form action="traitement-supprimer.php" method="POST">
        <div>
            <label for="id"></label>
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>">
        </div>
        <button type="submit">Supprimer</button>
    </form>
</div>

<?php require 'footer.php'; ?>