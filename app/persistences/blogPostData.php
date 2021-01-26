<?php
function lastBlogPosts(PDO $pdo) : array
{
    return [];
}

/* try {
    foreach ($pdo->query('select text, title, authors from posts inner join  authors ON `posts`.`authors_id` = `authors`.`id`') as $array) {
        print_r($array);
    }
    $pdo = null;

} catch (PDOException $e) {
    print "Erreur ! :" . $e->getMessage() . "<br>";
    die();
}
    */