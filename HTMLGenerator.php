<?php


class HTMLGenerator
{
    function generateHeader() {
        echo '<!DOCTYPE html>
                <html lang="en-US">
                <head>
                    <title>Weber Rental Service</title>
                    <meta charset="UTF-8">
                    <meta name="description" content="">
                    <meta name="keywords" content="">
                    <meta name="author" content="Josh Thomas">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                    <script src="js/main.js"></script>
                </head>
                
                <body>
                <div class="jumbotron jumbotron-fluid" id="header" style="cursor: pointer">
                    <div class="ml-5">
                        <h1 class="display-4">Weber Movie Rental</h1>
                        <p class="lead">Movie rental system for Weber State University students and faculty</p>
                    </div>
                </div>';
    }

    function generateInnerContent($contentType) {

    }

    function generateFooter() {
        echo '	</body>
                </html>';
    }

    function generateError() {

    }
}