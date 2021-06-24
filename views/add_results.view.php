<?php require './views/partials/head.php'; ?>

<div id="result">
    <pre>
<?php

try {
    $result = $app['dataBase']->add($app['config']['database']['table_name'], $_POST['fName'], $_POST['lName'], $_POST['phone'], $_POST['email']);
    if ($result) {
        echo 'Success!';
    } else {
        echo 'Failure.';
    }
} catch (PDOException $exception) {
    die('ERROR:' . var_dump($exception));
}

?>
</pre>
</div>

<?php require './views/partials/footer.php'; ?>