<?php

require_once 'DatabaseFunctions.php';
require_once 'HTMLGenerator.php';

session_start();

$DF = new DatabaseFunctions();
$GEN = new HTMLGenerator();

if (isset($_POST['username'], $_POST['password'])) {
    $_SESSION['username'] = $_POST['username'] ?? '';
    $_SESSION['password'] = $_POST['password'] ?? '';
}

if (isset($_SESSION['username'], $_SESSION['password'])) {
    if ($DF->verifyLogin($_SESSION['username'], $_SESSION['password'])) {
        echo $GEN->generateHeader();
        echo $GEN->generateInnerContent('messageLoginSuccess', $_SESSION['username']);
        echo $GEN->generateInnerContent('logoutButton');
        // movie stuff
        echo $GEN->generateInnerContent('listAllMovies');



        echo $GEN->generateFooter();
    } else {
        echo $GEN->generateHeader();
        echo $GEN->generateInnerContent('messageLoginError');
        echo $GEN->generateInnerContent('returnToLoginButton');
        echo $GEN->generateFooter();
    }
} else {
    echo $GEN->generateHeader();
    echo $GEN->generateInnerContent('messageLoginError');
    echo $GEN->generateInnerContent('returnToLoginButton');
    echo $GEN->generateFooter();
}