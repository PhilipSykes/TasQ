<?php 
session_start();

$_SESSION['logged-in'] = false;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasQ</title>

    <link rel="stylesheet" href="site.css">
    <link rel="stylesheet" href="landing.css">
</head>
<body>
    <div class="centered-col">
        <h1 class="landing-header">TasQ</h1>
        <a href="signup.php" class="button-primary sign-up">Sign Up</a>
        <a href="login.php" class="button login">Login</a>
    </div>

    <div id="cursor"></div>

    <script src="cursor.js"></script>
</body>
</html>