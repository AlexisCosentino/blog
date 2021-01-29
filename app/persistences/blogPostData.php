<?php

function lastBlogPosts(PDO $pdo) : array
{
    $result = $pdo ->query('select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin LIMIT 10');
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




//Creer un post
function blogPostCreate(PDO $pdo, $title, $text, $datebegin, $dateend, $important, $author) : bool
{
    $result = $pdo ->prepare('insert into posts (title, text, date_begin, date_end, important, authors_id) value (?, ?, ?, ?, ?, ?)');
    $result->bindParam(1, $title, PDO::PARAM_STR);
    $result->bindParam(2, $text, PDO::PARAM_STR);
    $result->bindParam(3, $datebegin, PDO::PARAM_STR);
    $result->bindParam(4, $dateend, PDO::PARAM_STR);
    $result->bindParam(5, $important, PDO::PARAM_STR);
    $result->bindParam(6, $author, PDO::PARAM_STR);
    return $result ->execute();

}



//function pour afficher les anciennes données de l'article avant l'update
function blogPostUpdateBefore(PDO $pdo, $modify_id) : array
{
    $result = $pdo->query("select title, text, date_begin, date_end, important, authors_id from posts where id = $modify_id");
    return $result->fetch(PDO::FETCH_ASSOC);
}



//Fonction pour envoyer les nouvelles données après update
function blogPostUpdate(PDO $pdo, $title, $text, $datebegin, $dateend, $important, $author, $modify_id) : bool
{
$result = $pdo->query("update posts
set title = '$title',
text = '$text',
date_begin='$datebegin',
date_end = '$dateend',
important = '$important',
authors_id = '$author'
where posts.id = $modify_id");
return $result->fetch(PDO::FETCH_ASSOC);
}


//Montrer les titre de touts les articles
function ShowPostsTitle(PDO $pdo) : array
{
    $result = $pdo->query('select title, id from posts');
    return $result->fetchAll(PDO::FETCH_ASSOC);
}




//Supprimer un article
function blogPostDelete(PDO $pdo, $postid)
{
    $result = $pdo->query("delete from posts where id = $postid");
}