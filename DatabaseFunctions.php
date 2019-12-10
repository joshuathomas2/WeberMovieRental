<?php


class DatabaseFunctions {
    function checkIfUserExists($username){

        try {
            $dbh = new PDO("mysql:host=icarus.cs.weber.edu;dbname=W01236296", 'W01236296','Joshuacs!');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'CONNECTION FAILURE: ' . $e->getMessage();
            die();
        }

        $statement = $dbh->prepare('SELECT * FROM `WMR_User` WHERE `Username` LIKE :username');
        $statement->bindParam(':username', $username);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $rows = $statement->fetchAll();

        if (sizeof($rows) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function createUser($username, $email, $password_hash) {
        try {
            $dbh = new PDO("mysql:host=icarus.cs.weber.edu;dbname=W01236296", 'W01236296','Joshuacs!');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'CONNECTION FAILURE: ' . $e->getMessage();
            die();
        }

        $statement = $dbh->prepare('INSERT INTO `WMR_User` (`Username`, `Email`, `Password_Hash`) VALUES (:username, :email, :password_hash)');
        $statement->bindParam(':username', $username);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password_hash', $password_hash);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
    }

    function verifyLogin($username, $password) {

    }
}








