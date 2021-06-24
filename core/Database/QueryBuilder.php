<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectFive($table, $intoClass, $argArray)
    {
        $start = ($_SESSION['page'] - 1) * 5;
        // Prepare and execute the statement
        $statement = $this->pdo->prepare("select * from {$table} limit {$start}, 5");
        $statement->execute();

        // Fetch ALL results, which could be ridiculously slow if database is huge
        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $intoClass, $argArray);
    }

    public function selectById($table, $intoClass, $argArray, $id) {
        // Prepare and execute the statement
        $statement = $this->pdo->prepare("select * from {$table} where id={$id}");
        $statement->execute();

        // Fetch ALL results, which could be ridiculously slow if database is huge
        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $intoClass, $argArray);
    }

    // NULL checks, checks if E-Mail already exists and if not, adds client to the list/database
    public function add(string $table, string $fName, string $lName, string $phone, string $email)
    {
        if (($table == '') || ($fName == '') || ($lName == '') || ($phone == '') || ($email == '')) {
            echo 'One or more fields were empty. ';
            return false;
        }

        try {
            $searchStatement = $this->pdo->prepare("SELECT * FROM {$table} WHERE email='{$email}'");
            $searchStatement->execute();
            $searchResult = $searchStatement->fetchAll(PDO::FETCH_OBJ);

            if ($searchResult != NULL) {
                echo 'E-mail already exists. ';
                return false;
            }

            $addStatement = $this->pdo->prepare("INSERT INTO {$table} (id, fName, lName, phone, email) VALUES (NULL, '{$fName}', '{$lName}', '{$phone}', '{$email}')");
            $result = $addStatement->execute();

            $_SESSION['max-id'] = intval(findMaxId($this, $table));

            return $result;
        } catch (PDOException $exception) {
            throw $exception;
        }
    }

    // NULL checks, checks if ID exists (sort of a defensive mechanism in case somebody modifies the hidden ID field), and edits the client with the given id on the given table
    public function edit(string $table, string $fName, string $lName, string $phone, string $email, string $id)
    {
        if (($id == '') || ($table == '') || ($fName == '') || ($lName == '') || ($phone == '') || ($email == '')) {
            echo 'One or more fields were empty. ';
            return false;
        }

        try {
            $searchStatement = $this->pdo->prepare("SELECT * FROM {$table} WHERE id='{$id}'");
            $searchStatement->execute();
            $searchResult = $searchStatement->fetchAll(PDO::FETCH_OBJ);

            if ($searchResult == NULL) {
                echo 'ID doesn\'t exist. ';
                return false;
            }

            $addStatement = $this->pdo->prepare("UPDATE {$table} SET fName='{$fName}', lName='{$lName}', phone='{$phone}', email='{$email}' WHERE {$table}.id={$id}");
            $result = $addStatement->execute();
            return $result;
        } catch (PDOException $exception) {
            throw $exception;
        }
    }

    // Deletes client with given id on given table
    public function delete($table, $id) {
        try {
            $statement = $this->pdo->prepare("delete from {$table} where {$table}.id={$id}");
            $result = $statement->execute();
            return $result;
        } catch(PDOException $exception) {
            throw $exception;
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}

?>