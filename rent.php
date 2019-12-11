<?php

require 'DatabaseFunctions.php';
require 'HTMLGenerator.php';

session_start();
$movieID = $_POST['movieID'];

$DF = new DatabaseFunctions();
$GEN = new HTMLGenerator();

echo $GEN->generateHeader();
echo $GEN->generateInnerContent('returnToMoviesButton');
echo $GEN->generateSelectedMovieList($movieID);
echo $GEN->generateInnerContent('confirmRentalButton');
echo $GEN->generateFooter();