<?php

require_once 'DatabaseFunctions.php';
require_once 'HTMLGenerator.php';

$DF = new DatabaseFunctions();
$GEN = new HTMLGenerator();
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';
$password_hash = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

// Check if any data has been entered (prevents users from manually navigating to createAccount.php and creating a blank account)
// Check if the User Exists, if it does, return an error message, else, process the input and create the account
if ($email == '' || $username == '') {
    echo $GEN->generateHeader();
    echo $GEN->generateInnerContent('messageAccountFailed', $username);
    echo $GEN->generateInnerContent('returnToCreateAccountButton');
    echo $GEN->generateFooter();
} else {
    if ($DF->checkIfUserExists($username)) {
        echo $GEN->generateHeader();
        echo $GEN->generateInnerContent('messageAccountFailed', $username);
        echo $GEN->generateInnerContent('returnToCreateAccountButton');
        echo $GEN->generateFooter();
    } else {
        echo $GEN->generateHeader();
        echo $GEN->generateInnerContent('messageAccountCreated', $username);
        echo $GEN->generateInnerContent('returnToLoginButton');
        echo $GEN->generateFooter();
        $DF->createUser($username, $email, $password_hash);
    }
}


