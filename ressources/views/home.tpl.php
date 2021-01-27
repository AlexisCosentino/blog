<?php

require 'header.tpl.php';

/*
if (!empty($lastposts)) {
    foreach ($lastposts as $row) {
        echo "<li>" . $row['title'] . " - " . $row['text'] . " Ecrit par " . $row['name'] . "   " . $row['firstname'] . "</li>";
    }
} else {
    echo "Il n'y a pas de données à afficher";
}
*/
?>

<article class="blogpost">
    <?php if (!empty($lastposts)): foreach ($lastposts as $row): ?>
    <header>
        <h2>
            <?=$row['title']?>
        </h2>

    </header>
            <p>
                <?=$row['text']?>
            </p>
    <footer>
        <p>
            Ecrit par :
            <?=$row['firstname'], $row['name']?>
        </p>
    </footer>
    <?php endforeach; else: ?>
            <p>Il n'y a aucun post</p>
    <?php endif;?>
</article>

<?php
require 'footer.tpl.php';
?>