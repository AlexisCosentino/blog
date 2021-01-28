<?php

require 'header.tpl.php';

/*
 if (!empty($postById)) {

        echo "<li>" . $postById['title'] . " - " . $postById['text'] . " Ecrit par " . $postById['name'] . "   " . $postById['firstname'] . "</li>";

} else {
    require 'errors/error.php';
}

if (!empty($commentsBy)) {
    foreach ($commentsBy as $row) {
        echo "<li>" . "Commentaire : " . $row['text'] . " Ecrit par " . $row['name'] . "  " . $row['firstname'] . "</li>";
    }
} else {
echo "Aucun commetnaire sur ce sujet";
}
*/
?>

<h4 class="pb-5">Pour lire un article en particulier, merci de rentrer un id dans l'URI</h4>

<article class="blogpost">
    <header>
        <h3> <?=$postById['title']?></h3>
        <p>
            Ecrit par <?=$postById['firstname'], $postById['name']?>.
        </p>
    </header>
        <p>
            <?=$postById['text']?>
        </p>

    <section>
        <h3>  COMMENTAIRES : </h3>
        <?php if (!empty($commentsBy)): foreach($commentsBy as $row): ?>
        <article>
            <p><?=$row['text']?></p>
           <footer> <p>Ecrit par <?=$row['firstname'],  $row['name']?></p>
           </footer>
        </article>
        <?php endForeach; else:?>
         <p> Aucun Commentaires ma gueule ! </p>

        <?php endif; ?>
    </section>
</article>

<?php
require 'footer.tpl.php';
?>