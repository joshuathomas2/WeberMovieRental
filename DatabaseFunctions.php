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
        $statement->execute();
    }

    function verifyLogin($username, $password) {
        try {
            $dbh = new PDO("mysql:host=icarus.cs.weber.edu;dbname=W01236296", 'W01236296','Joshuacs!');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'CONNECTION FAILURE: ' . $e->getMessage();
            die();
        }

        $statement = $dbh->prepare('SELECT `Password_Hash` FROM `WMR_User` WHERE `Username` LIKE :username');
        $statement->bindParam(':username', $username);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $password_hash = $statement->fetchAll();

        if (sizeof($password_hash) > 0) {
            return password_verify($password, $password_hash[0]['Password_Hash']);
        } else {
            return false;
        }
    }

    function getMovies() {
        try {
            $dbh = new PDO("mysql:host=icarus.cs.weber.edu;dbname=W01236296", 'W01236296','Joshuacs!');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'CONNECTION FAILURE: ' . $e->getMessage();
            die();
        }

        $statement = $dbh->prepare('SELECT * FROM `WMR_Movie`');
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $movies = $statement->fetchAll();
        return $movies;

    }

    function getMovieByID($movieID) {
        try {
            $dbh = new PDO("mysql:host=icarus.cs.weber.edu;dbname=W01236296", 'W01236296','Joshuacs!');
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'CONNECTION FAILURE: ' . $e->getMessage();
            die();
        }

        $statement = $dbh->prepare('SELECT * FROM `WMR_Movie` WHERE `ID` = :ID');
        $statement->bindParam(':ID', $movieID);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();
        $movie = $statement->fetchAll();
        return $movie;
    }

















}








