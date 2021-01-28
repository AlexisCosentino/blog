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

//function blogPostCreate(PDO $pdo, $createTitle, $createText, $createdateB, $createdateE, $createImportant, $authors_id) : array
/*function blogPostCreate(PDO $pdo, $inputs) : array
{
    $result = $pdo->prepare("insert into posts (title, text, important, authors_id) value ($inputs)");
    $result ->execute();
    $resultfunction = $result-> fetch(PDO::FETCH_ASSOC);
    return $resultfunction;
    // $result = $pdo ->query("insert into posts (title, text, important, authors_id) value ($createTitle, $createText, $createdateB, $createdateE, $createImportant, $authors_id)");
    //return $result -> fetch(PDO::FETCH_ASSOC);
}
*/
//select posts.title, posts.text, authors.name, authors.firstname from posts inner join authors ON posts.authors_id = authors.id order by posts.date_begin limit 10

function blogPostCreate(PDO $pdo, $title, $text, $datebegin, $dateend, $important, $author) : bool
{
    $result = $pdo->query("insert into posts (title, text, date_begin, date_end, important, authors_id) value ('$title', '$text', '$datebegin', '$dateend', '$important', '$author')");
    return $result->fetch(PDO::FETCH_ASSOC);
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