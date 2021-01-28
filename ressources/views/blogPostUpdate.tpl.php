<?php
require 'header.tpl.php';
?>

<?php

If (isset($_POST['submit'])) : ?>

    <h2 class="text-success"> Votre modification à bien été pris en compte mon gars !</h2>

<?php else : ?>

    <h4 class="pb-5">Pour modifier un article en particulier, merci de rentrer le bon ID dans l'URI</h4>

    <form action="index.php?action=blogpostmodify&id=<?=$modify_id?>" method="POST" class="form-example">
        <div class="form-example">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" value=" <?= $databefore['title'] ?> " required>
        </div>

        <div class="form-example">
            <label for="text">Texte de l'article </label>
            <input type="text" name="text" id="text" value="<?= $databefore['text'] ?>" required>
        </div>

        <div class="form-example">
            <label for="start">Date de début :</label>

            <input type="date" id="start" name="date_begin"
                   value="<?= $databefore['date_begin'] ?>"
                   min="2021-01-01" max="2022-12-31">
        </div>

        <div class="form-example">
            <label for="start">Date de fin :</label>

            <input type="date" id="start" name="date_end"
                   value="<?= $databefore['date_end'] ?>"
                   min="2021-01-01" max="2022-12-31">
        </div>

        <div class="form-example">
            <label for="important">Importance de 1 à 5 :</label>
            <select name="important" id="important">
                <option value="<?= $databefore['important'] ?>"> <?= $databefore['important'] ?> </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-example">
            <label for="author">Votre pseudo d'auteur :</label>
            <select name="author" id="author">
                <option value=""> Quel est votre pseudo ? </option>
                <option value="1">Matéo</option>
                <option value="2">yoyo35</option>
                <option value="3">billy</option>
                <option value="4">valentine</option>
                <option value="7">matthew</option>
                <option value="8">banana58</option>
            </select>
        </div>

        <div class="form-example">
            <input type="submit" value="Envoyer" name="submit">
        </div>
    </form>

<?php endif ?>

<?php
require 'footer.tpl.php';
?>