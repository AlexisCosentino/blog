<?php

require 'app/persistences/blogPostData.php';
echo "hello world";

$lastposts = lastBlogPosts($pdo);

require 'ressources/views/home.tpl.php';