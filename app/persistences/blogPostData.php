<?php
function lastBlogPosts(PDO $pdo) : array
{
    return [$pdo ->query('select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin limit 10')];
}

$lastBlogPosts = lastBlogPosts($pdo);

//select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin limit 10

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