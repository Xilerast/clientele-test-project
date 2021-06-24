<?php

class Connection {
    public static function make($config) {
        try {
            // Connect to database. WARNING: Make sure to activate Apache and MySQL database first
            return new PDO(
                $config['connection'].'dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $exception) {
            // Throw exception if this fails
            die('Could not connect: ' . $exception->getMessage());
        }

    }
}

?>