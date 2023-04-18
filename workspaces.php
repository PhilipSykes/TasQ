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
        <a class="nav-buttons current">Workspaces</a>
        <a href="profile.php" class="nav-buttons">Profile</a>
    </div>
</nav>


<div class="main-container">
    <h1 class="page-title">Workspaces</h1>

    <div class="workspace-container">
        <div class="workspace"></div>
        <a href="create-workspace.php" class="workspace-add">+</a>
    </div>
</div>

</body>
</html>