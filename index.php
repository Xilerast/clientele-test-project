<?php

session_start();

require './core/includes.php';

$_SESSION['page'] = ($_GET == NULL) ? 1 : @$_GET['page']; // Disable warnings if page is not a GET parameter with the @ sign
$_SESSION['max-id'] = intval(findMaxId($app['dataBase'], $app['config']['database']['table_name']));
$_SESSION['max-id-page'] = 0;

$router = new Router;

require './routes.php';

require Router::load('./routes.php')->direct(Request::uri());

?>