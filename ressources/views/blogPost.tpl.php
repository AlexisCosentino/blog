<?php

require 'header.tpl.php';

if (!empty($postById)) {

        echo "<li>" . $postById['title'] . " - " . $postById['text'] . " Ecrit par " . $postById['name'] . "   " . $postById['firstname'] . "</li>";

} else {
    echo "Il n'y a pas de données à afficher";
}

if (!empty($commentsBy)) {
    foreach ($commentsBy as $row) {
        echo "<li>" . "Commentaire : " . $row['text'] . " Ecrit par " . $row['name'] . "  " . $row['firstname'] . "</li>";
    }
} else {
    echo "Il n'y a pas de données à afficher";
}


require 'footer.tpl.php';