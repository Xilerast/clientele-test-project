<?php require './views/partials/head.php'; ?>

<div id="result">
    <pre>
    <?php

    try {
        $result = $app['dataBase']->delete($app['config']['database']['table_name'], $_GET['id']);
        if ($result) {
            echo 'Success!';
        } else {
            echo 'Failure.';
        }
    } catch (PDOException $exception) {
        die('ERROR: '.var_dump($exception));
    }

    ?>
    </pre>
</div>

<?php require './views/partials/footer.php'; ?>