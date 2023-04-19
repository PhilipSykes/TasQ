<?php
session_start();

//include_once('database-utils.php');

//FetchWorkspace($_SESSION['currentWorkspace'])
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="site.css">

    <title>TasQ</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
</head>
<body>

<nav class="navbar">
    <div class="nav-title">TasQ</div>

    <div>
        <a href="workspaces.php" class="nav-buttons current">Workspaces</a>
        <a href="profile.php" class="nav-buttons">Profile</a>
    </div>
</nav>


<div class="main-container">
    <div class="page-header-container">
        <form id="title">
            <input class="page-title" type="text" name="title" placeholder="Workspace Title" value="<?php echo $_SESSION['workspaceName']?>"></input>
        </form>
        <div>
            <a href="" class="button-primary">Invite Members</a>
        </div>
    </div>

    <div class="list-container">
        <div class="list-content">
            <form class="list">
                <input class="list-name" type="text" placeholder="List Title" name="listTitle"></input>
            </form>
            <form class="new-item" method="post">
                <div class="item-container">
                    <button class="add-item-btn" type="submit" value="add" name="submit">+</button>
                    <input class="item-name" type="text" placeholder="List"></input>
                </div>
            </form>
        </div>
    </div>

    
</div>

<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
<script src="workspace.js"></script>
</body>
</html>