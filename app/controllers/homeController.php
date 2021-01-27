<?php

require 'app/persistences/blogPostData.php';

$lastposts = lastBlogPosts($pdo);

require 'ressources/views/home.tpl.php';