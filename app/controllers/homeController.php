<?php

require 'app/persistences/blogPostData.php';
echo "hello world";

$lastposts = lastBlogPosts($pdo);

var_dump($lastposts);



/*foreach ($lastBlogPosts as $row) {
    echo "<li>" . $row['posts.title'] . " - " . $row['posts.text'] . " Ecrit par " . $row['authors.name'] . "   " . $row['authors.firstname'] . "</li>";
}*/