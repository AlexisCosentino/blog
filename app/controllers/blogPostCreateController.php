<?php

require 'app/persistences/blogPostData.php';


$inputs = filter_input_array(INPUT_POST, $_POST); //Filtre de validation avec les valeurs du tableau parameters

//Faire en sorte aue si le formulaire est ok je fais la fonction, sinon je charge le formulaire
if (isset($inputs['title'])){
    blogPostCreate($pdo, $inputs['title'], $inputs['text'],  $inputs['date_begin'], $inputs['date_end'], $inputs['important'], $inputs['author']);
}

require 'ressources/views/blogCreatePost.tpl.php';

