<?php
session_start();
include_once('database-utils.php');

if(isset($_POST['update']))
{
    if($_POST['username'] != ""){
        UpdateUsername($_POST['username']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="site.css">

    <title>TasQ</title>  
</head>
<body>

<nav class="navbar">
    <div class="nav-title">TasQ</div>
    
    <div>
        <a href="workspaces.php" class="nav-buttons">Workspaces</a>
        <a class="nav-buttons current">Profile</a>
    </div>
</nav>

<div class="main-container">
    <div class="page-header-container">
        <h1 class="page-title">Profile</h1>
        <a href="signout.php" class="button-primary">Sign Out</a>
    </div>


    <img class="profile-pic" src="<?php echo $_SESSION['picpath']; ?>">

    <h3 class="profile-uname-label">Username</h3>
    <div class="username-container">
        <form method="POST">
            <input class="profile-uname" type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['username']?>" autocomplete="off"></input>
            <button name="update" class="edit-button">Change Username</button>
            <a style="color: red;"class="edit-button" href="delete-account.php">Delete Account</a>
        </form>
    </div>

    
</div>


</body>
</html>