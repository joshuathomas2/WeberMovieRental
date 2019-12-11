<?php


class HTMLGenerator
{
    function generateHeader() {
        return '<!DOCTYPE html>
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
                <div class="jumbotron jumbotron-fluid h-50" id="header" style="cursor: pointer">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <h1 class="display-4 px-5">Weber Movie Rental</h1>
                        <p class="lead px-5">Movie rental system for Weber State University students and faculty</p>
                    </div>
                    <div class="col-3">
                        <img src="img/logo.png" class="img-fluid d-inline-block" alt="Weber State University Logo">
                    </div>
                </div>
            </div>
        </div>';
    }

    function generateInnerContent($contentType, $username = '') {
        if ($contentType == 'messageAccountCreated') {
            return '<p class="lead ml-5">Thank you ' . $username . ' for signing up! You can now sign in with your username and password.</p>';
        }

        if ($contentType == 'messageAccountFailed') {
            return '<p class="lead ml-5">The username ' . $username . ' has already been taken.</p>';
        }

        if ($contentType == 'returnButton') {
            return '<form action="index.html">
				<button class="btn btn-primary ml-5" type="submit">Return to Login</button>
			</form>';
        }
    }

    function generateFooter() {
        return '	</body>
                </html>';
    }
}