<?php

function lastBlogPosts(PDO $pdo) : array
{
    $result = $pdo ->query('select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin limit 10');
    return $result -> fetchAll();
}





//select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin limit 10
