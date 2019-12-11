<?php

require 'DatabaseFunctions.php';
require 'HTMLGenerator.php';

session_start();

$DF = new DatabaseFunctions();
$GEN = new HTMLGenerator();

echo $GEN->generateHeader();
echo $GEN->generateInnerContent('returnToMoviesButton');
echo $GEN->generateFooter();
echo $_SESSION['username'];
echo '<br>';
echo $_POST['movieID'];