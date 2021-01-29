<?php
error_reporting (E_ALL);
ini_set('display_errors', true);


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$routes = [
    'database' => 'config/database.php',
    'index' => 'app/controllers/homeController.php',
    'blogpost' => 'app/controllers/blogPostController.php',
    'blogpostcreate' => 'app/controllers/blogPostCreateController.php',
    'blogpostmodify' => 'app/controllers/blogPostModifyController.php',
    'blogpostdeletelist' => 'app/controllers/blogPostDeleteController.php',
    'blogpostdelete' => 'app/controllers/blogPostDeleteController.php',
    'error' => 'ressources/views/errors/error.php',
];

/** @define "$routes" "/" */

require $routes['database'];


if (isset($action)) {
    if (array_key_exists($action, $routes)) {
        require $routes[$action];
    } else {
        header("HTTP/1.0 404 Not Found");
        require $routes['error'];
    }
} else {
    require $routes['index'];
}

