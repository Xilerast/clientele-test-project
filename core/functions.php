<?php

    function findMaxId($database, $table) {
        $searchStatement = $database->getPdo()->prepare("select MAX(id) as id from {$table}");
        $searchStatement->execute();
        $maxIdResult = $searchStatement->fetchAll(PDO::FETCH_OBJ);
        return $maxIdResult[0]->id;
    }

?>