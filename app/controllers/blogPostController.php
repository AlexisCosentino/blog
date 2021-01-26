<?php

require 'app/persistences/blogPostData.php';

$posts_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$postById = blogPostById($pdo, $posts_id);
$commentsBy = commentsByBlogPost($pdo, $posts_id);

require 'ressources/views/blogPost.tpl.php';