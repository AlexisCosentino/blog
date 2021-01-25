<?php

echo "hello world";

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$routes = [
    'database' => 'config/database.php',

];

/** @define "$routes" "/" */

if (isset($action)) {
    if (array_key_exists($action, $routes)) {
        require $routes[$action];
    } else {
        header("HTTP/1.0 404 Not Found");
        require $routes['error'];
        echo $buffer;
    }
} else {
    require $routes['index.php'];
}

include $routes['database'];
