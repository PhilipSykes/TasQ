<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TasQ</title>

    <link rel="stylesheet" href="site.css">
</head>


<?php 
session_start();

if($_SESSION['logged-in']) {
    header("Location: /TasQ/worspaces.php");
}

include_once('database-utils.php');
include_once('utils.php');

$allFields = true;
$passwordErr = $usernameErr = "";

if (isset($_POST['submit'])){
    if ($_POST['username']=="")
    {
        $usernameErr = "This field is required";
        $allFields = false;
    }
    if ($_POST['password']=="")
    {
        $passwordErr = "This field is required";
        $allFields = false;
    }
    if($allFields){
        $rows_array = Login($_POST['username'], $_POST['password']);

        if($rows_array != null) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $rows_array[0]['Username'];

            FetchPfp();

            header("Location: workspaces.php");
            exit;
        }
    }
    
}
?>
<body>
    <div class="centered-col form">
        <h1 class="form-header">TasQ</h1>
        <form class="form-container" method="post">
            <div class="form-section">
                <label class="form-label">Username</label>
                <input type="text" class="form-text" name="username">
                <label class="form-error"><?php echo $usernameErr?></label>
            </div>
            <div class="form-section">
                <label class="form-label">Password</label>
                <input type="password" class="form-text" name="password">
            </div>
            <div class="form-section submit">
                <input type="submit" class="button-primary form-button" value="Sign Up!" name="submit">
            </div>
        </form>
    </div>
</body>
</html>