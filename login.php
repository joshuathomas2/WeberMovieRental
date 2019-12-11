<?php

require_once 'DatabaseFunctions.php';
require_once 'HTMLGenerator.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$DF = new DatabaseFunctions();
$GEN = new HTMLGenerator();

if ($DF->verifyLogin($username, $password)) {
    echo $GEN->generateHeader();
    echo $GEN->generateInnerContent('messageLoginSuccess', $username);
    echo $GEN->generateInnerContent('logoutButton');
    echo $GEN->generateFooter();
} else {
    echo $GEN->generateHeader();
    echo $GEN->generateInnerContent('messageLoginError');
    echo $GEN->generateInnerContent('returnToLoginButton');
    echo $GEN->generateFooter();
}
