<?php

// Find the client, search by ID and store to variable which can be used to fill up the form
$client = $app['dataBase']->selectById($app['config']['database']['table_name'], 'Client', [0, '', '', '', ''], $_GET['id']);
$_SESSION['edit_user_id'] = $_GET['id'];

require './views/edit_client.view.php';

?>