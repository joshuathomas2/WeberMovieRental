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

        if ($contentType == 'messageLoginError') {
            return '<div class="card">
            <div class="card-body">
                <h2 class="card-title bg-danger text-white text-center">Error logging in (Invalid credentials)</h2>
            </div>
        </div>';
        }

        if ($contentType == 'messageLoginSuccess') {
            return '<div class="card">
            <div class="card-body">
                <h2 class="card-title bg-success text-white text-center">You were successfully logged in! Welcome to Weber Movie Rental, ' . $username .'!</h2>
            </div>
        </div>';
        }

        if ($contentType == 'messageLogoutSuccess') {
            return '<div class="card">
            <div class="card-body">
                <h2 class="card-title bg-success text-white text-center">You were successfully logged out.</h2>
            </div>
        </div>';
        }

        if ($contentType == 'messageMovieSelection') {
            return '<div class="card mt-5">
            <div class="card-body">
                <h2 class="card-title bg-primary text-white text-center">Movie Selection</h2>
            </div>
        </div>';
        }

        if ($contentType == 'messageYourMovies') {
            return '<div class="card">
            <div class="card-body">
                <h2 class="card-title bg-primary text-white text-center">Your Rented Movies</h2>
            </div>
        </div>';
        }

        if ($contentType == 'returnToLoginButton') {
            return '<form action="index.html">
				<button class="btn btn-link d-inline pl-5" type="submit">Return to Login</button>
			</form>';
        }

        if ($contentType == 'logoutButton') {
            return '<form action="logout.php">
				<button class="btn btn-link d-inline pl-5 mx-5" type="submit">Logout</button>
			</form>';
        }

        if ($contentType == 'returnToCreateAccountButton') {
            return '<form action="createAccount.html">
				<button class="btn btn-link d-inline pl-5" type="submit">Return to Create Account</button>
			</form>';
        }

        if ($contentType == 'returnToMoviesButton') {
            return '<form action="login.php">
				<button class="btn btn-link d-inline pl-5" type="submit">Return to Movies</button>
			</form>';
        }

        if ($contentType == 'confirmRentalButton') {
            return '<div class="form-group">
                     <button type="submit" class="btn btn-primary">Confirm Rental</button>
                </div>';
        }

        if ($contentType == 'listAllMovies') {
            $DF = new DatabaseFunctions();
            $movies = $DF->getMovies();
            $number_of_movies = sizeof($movies);

            $tableTop = "<table class='table'>
                                <thead>
                                    <tr>
                                        <th class='scope-col'>ID</th>
                                        <th class='scope-col'>Movie Title</th>
                                        <th class='scope-col'>Year</th>
                                        <th class='scope-col'>Rent</th>
                                    </tr>
                                </thead>
                                <tbody>";

            $tableInner = "";
            $tableBottom = "</tbody></table>";

            for ($i = 0; $i < $number_of_movies - 1; $i++) {

                $movie_id = $movies[$i]['ID'];
                if ($movies[$i]['Is_Rented'] == 0) {
                    $rentedButton = '<form class="ml-5" action="rent.php" method="post">
                    <div class="form-group">
                    <input class="form-control w-25" type="hidden" id="movieID" name="movieID" value=' . $movie_id . '>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Rent This Movie</button>
                    </div>
                    </form>';
                } else {
                    $rentedButton = '
                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning ml-5" disabled>Unavailable</button>
                                        </div>';
                }




                $tableInner .= "<tr><th class='scope-row'>" . $movies[$i]['ID'] . "</th>
                                    <td>" . $movies[$i]['Title'] . "</td>
                                    <td>" . $movies[$i]['Year'] . "</td>
                                    <td>" . $rentedButton . "</td>
                                </tr>";

            }

            return $tableTop . $tableInner . $tableBottom;

        }

        if ($contentType == 'listUserMovies') {
            $tableTop = "<table class='table'>
                                <thead>
                                    <tr>
                                        <th class='scope-col'>ID</th>
                                        <th class='scope-col'>Movie Title</th>
                                        <th class='scope-col'>Year</th>
                                    </tr>
                                </thead>
                                <tbody>";

            $tableInner = "";
            $tableBottom = "</tbody></table>";

            return $tableTop . $tableInner . $tableBottom;
        }

        if ($contentType == 'listSelectedMovie') {

        }








        return '';
    }

    function generateFooter() {
        return '	</body>
                </html>';
    }

    function generateSelectedMovieList($movieID) {
        $DF = new DatabaseFunctions();
        $movie = $DF->getMovieByID($movieID);
        $tableTop = "<table class='table'>
                                <thead>
                                    <tr>
                                        <th class='scope-col'>ID</th>
                                        <th class='scope-col'>Movie Title</th>
                                        <th class='scope-col'>Year</th>
                                    </tr>
                                </thead>
                                <tbody>";
        $tableInner = '';
        $tableInner .= "<tr><th class='scope-row'>" . $movie[0]['ID'] . "</th>
                                    <td>" . $movie[0]['Title'] . "</td>
                                    <td>" . $movie[0]['Year'] . "</td>
                                </tr>";
        $tableBottom = "</tbody></table>";

        return $tableTop . $tableInner . $tableBottom;
    }
}