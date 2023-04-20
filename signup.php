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

include_once('database-utils.php');
include_once('utils.php');

$allFields = true;
$passwordErr = $nameErr = $emailErr = $usernameErr = "";

if (isset($_POST['submit'])){
    if ($_POST['fname']=="")
    {
        $nameErr = "This field is required";
        $allFields = false;
    }
    if ($_POST['lname']=="")
    {
        $nameErr = "This field is required";
        $allFields = false;
    }
    if ($_POST['username']=="")
    {
        $usernameErr = "This field is required";
        $allFields = false;
    }
    if ($_POST['email']=="")
    {
        $emailErr = "This field is required";
        $allFields = false;
    }
    else {
        //check valid email
        $emailErr = CheckEmail($_POST['email']);
        if($emailErr != ""){
            $allFields = false;
        }
    }
    if ($_POST['password'] =="" || $_POST['confirm'] =="") {
        $passwordErr = "This field is required";
        $allFields = false;
    }
    else if($_POST['password'] != $_POST['confirm']){
        $passwordErr = "Passwords do not match";
        $allFields = false;
    }

    if ($allFields) {
        $usernameErr = SignUp($_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['email'], $_POST['password']);

        if($usernameErr == "") {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['picpath'] = "ProfilePic/default.png";
            
            header("Location: workspaces.php");
            exit();
        }
    }
}
?>
<body>
    <div class="centered-col form">
        <h1 class="form-header">TasQ</h1>
        <form class="form-container" method="post">
            <div class="form-section">
                <label class="form-label">Name</label>
                <div class="name-container">
                    <input type="text" class="form-text left" name="fname">
                    <input type="text" class="form-text" name="lname">
                </div>
                <label class="form-error"><?php echo $nameErr?></label>
            </div>
            <div class="form-section">
                <label class="form-label">Username</label>
                <input type="text" class="form-text" name="username">
                <label class="form-error"><?php echo $usernameErr?></label>
            </div>
            <div class="form-section">
                <label class="form-label">Email</label>
                <input type="text" class="form-text" name="email">
                <label class="form-error"><?php echo $emailErr?></label>
            </div>
            <div class="form-section">
                <label class="form-label">Password</label>
                <input type="password" class="form-text" name="password">
                
            </div>
            <div class="form-section" style="padding-top: 20px;">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-text" name="confirm">
                <label class="form-error"><?php echo $passwordErr?></label>
            </div>
            <div class="form-section submit">
                <input type="submit" class="button-primary form-button" value="Sign Up!" name="submit">
            </div>
        </form>
    </div>
</body>
</html>