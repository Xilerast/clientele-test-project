<?php

// Save all clients in an array of type Client (class), which can be iterated for echoing
// WARNING: This is going to be really slow if there are a lot of entries in the database
// Refer to README.md for information on how this can be improved
$clients = $app['dataBase']->selectFive($app['config']['database']['table_name'], 'Client', [0, '', '', '', '']);

require './views/index.view.php';

?>