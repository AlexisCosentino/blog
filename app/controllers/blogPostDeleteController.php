<?php

require 'app/persistences/blogPostData.php';

$poststitle = ShowPostsTitle($pdo);
require 'ressources/views/blogPostDeleteList.tpl.php';

$posts_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);


blogPostDelete($pdo, $posts_id);
require 'ressources/views/blogPostDelete.tpl.php';



//$idvariable = filter_input(INPUT_POST, $poststitle['id']);









