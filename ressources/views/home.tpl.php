<?php

require 'header.tpl.php';

if (!empty($lastposts)) {
    foreach ($lastposts as $row) {
        echo "<li>" . $row['title'] . " - " . $row['text'] . " Ecrit par " . $row['name'] . "   " . $row['firstname'] . "</li>";
    }
} else {
    echo "Il n'y a pas de données à afficher";
}
require 'footer.tpl.php';