<?php 
echo "hello world";


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$routes = [
/*    'hello' => 'pages/hello.php',
    'portfolio' => 'pages/portfolio.php',
    'loisir' => 'pages/loisir.php',
    'parcours' => 'pages/parcours.php',
    'contact' => 'pages/contact.php',
    'error' => 'pages/error.php',   */
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
    require $routes['hello'];
}


