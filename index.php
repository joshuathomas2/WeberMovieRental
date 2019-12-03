<?php

echo '<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Josh Thomas">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>

	<body>
	    <div class="jumbotron jumbotron-fluid">
	        <h1 class="display-4">Weber Movie Rental</h1>
	        <p class="lead">Movie rental system for Weber State University students and faculty</p>
        </div>
	    
		<div>
		    <form action="login.php" method="post">
		        <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text">
		        </div>
		        <div class="form-group">
		            <label for="password">Password</label>
		            <input id="password" name="password" type="password">
		        </div>
		        <div class="form-group">
                     <button type="submit" class="btn btn-primary">Login</button>
                </div>  
		    </form>
		</div>
	</body>
</html>';

