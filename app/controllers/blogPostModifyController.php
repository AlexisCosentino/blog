<?php

require 'app/persistences/blogPostData.php';

$modify_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$inputs_modify = filter_input_array(INPUT_POST, $_POST);



if (isset($_POST['submit'])){
    blogPostUpdate($pdo, $inputs_modify['title'], $inputs_modify['text'], $inputs_modify['date_begin'], $inputs_modify['date_end'], $inputs_modify['important'], $inputs_modify['author'], $modify_id);
} else {
    $databefore = blogPostUpdateBefore($pdo, $modify_id);
}

require 'ressources/views/blogPostUpdate.tpl.php';


