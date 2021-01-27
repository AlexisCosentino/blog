<?php

require 'app/persistences/blogPostData.php';

//Faire en sorte aue si le formulaire est ok je fais la fonction, sinon je charge le formulaire
if ($form == false || $form == null){
    require 'ressources/views/blogCreatePost.tpl.php';
} else {
    blogPostCreate($pdo, $parameters['title'], $parameters['text'], $parameters['date_begin'], $parameters['date_end'], $parameters['important'], $parameters['auteur']);
}

require 'ressources/views/blogCreatePost.tpl.php';