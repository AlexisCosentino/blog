<?php

function lastBlogPosts(PDO $pdo) : array
{
    $result = $pdo ->query('select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin limit 10');
    return $result -> fetchAll();
}

function blogPostById(PDO $pdo, $posts_id) : array
{
    $result = $pdo ->query("select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id where posts.id = $posts_id");
    return $result -> fetch(PDO::FETCH_ASSOC);
}


function commentsByBlogPost(PDO $pdo, $posts_id) : array
{
    $result = $pdo ->query("select comments.text, authors.name, authors.firstname from comments inner join authors ON comments.authors_id = authors.id where comments.posts_id = $posts_id");
    return $result -> fetchAll();
}


//select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin limit 10
