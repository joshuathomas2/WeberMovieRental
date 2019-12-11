<?php

require_once 'DatabaseFunctions.php';
require_once 'HTMLGenerator.php';


$DF = new DatabaseFunctions();
$GEN = new HTMLGenerator();
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password_hash = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

// Check if the User Exists, if it does, return an error message, if it does not, process the input and create the account
if ($DF->checkIfUserExists($username)) {
    echo $GEN->generateHeader();
    echo $GEN->generateInnerContent('messageAccountFailed', $username);
    echo $GEN->generateInnerContent('returnButton');
    echo $GEN->generateFooter();
} else {
    echo $GEN->generateHeader();
    echo $GEN->generateInnerContent('messageAccountCreated', $username);
    echo $GEN->generateInnerContent('returnButton');
    echo $GEN->generateFooter();
    $DF->createUser($username, $email, $password_hash);
}
