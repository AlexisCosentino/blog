<?php

$page = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$routes = [
    'database' => 'config/database.php',
    'index' => 'app/controllers/homeController.php',
];

/** @define "$routes" "/" */

if (isset($page)) {
    if (array_key_exists($page, $routes)) {
        require $routes[$page];
    } else {
        header("HTTP/1.0 404 Not Found");
        require $page['error'];
        echo $buffer;
    }
} else {
    require $routes['index'];
}

include $routes['database'];
