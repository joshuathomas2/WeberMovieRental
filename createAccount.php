<?php

include_once 'DatabaseFunctions.php';
include_once 'HTMLGenerator.php';


$DF = new DatabaseFunctions();
//$GEN = new HTMLGenerator();
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? '';

// Check if the User Exists, if it does, return an error message, if it does not, process the input and create the account
if ($DF->checkIfUserExists($username)) {
    echo 'This username already exists, please choose a different one.';
} else {
    //$GEN->generateHeader();
    echo 'Thank you ' . $username . ' for signing up!';
    //$GEN->generateFooter();
    $DF->createUser($username, $email, $password_hash);
}
