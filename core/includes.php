<?php

$app = [];

$app['config'] = require './config.php';

require './core/functions.php';
require './core/router.php';
require './core/client.php';
require './core/Database/request.php';
require './core/Database/connection.php';
require './core/Database/QueryBuilder.php';

$app['dataBase'] = new QueryBuilder(Connection::make($app['config']['database']));

?>