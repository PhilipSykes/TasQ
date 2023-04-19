<?php
session_start();
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
        <h2 class="profile-uname">
            <?php echo $_SESSION['username']?>
        </h2>
        <a href="" class="edit-button">change</a>
    </div>
</div>


</body>
</html>