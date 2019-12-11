<?php

require 'DatabaseFunctions.php';
require 'HTMLGenerator.php';

$DF = new DatabaseFunctions();
$GEN = new HTMLGenerator();

session_start();
session_unset();

echo $GEN->generateHeader();
echo $GEN->generateInnerContent('returnToLoginButton');
echo $GEN->generateInnerContent('messageLogoutSuccess');
echo $GEN->generateFooter();

