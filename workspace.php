<?php
session_start();

include_once('database-utils.php');

//FetchWorkspace($_SESSION['currentWorkspace'])

$rows_array = FetchLists($_SESSION['currentWorkspace']);

if (isset($_POST['listTitle']))
{
    AddList($_POST['listTitle']);
    $rows_array = FetchLists($_SESSION['currentWorkspace']);
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
        <form id="title" autocomplete="off">
            <input class="page-title" type="text" name="title" placeholder="Workspace Title" value="<?php echo $_SESSION['workspaceName']?>"></input>
        </form>
        <div>
            <a href="" class="button-primary">Invite Members</a>
        </div>
    </div>

    <div class="list-container">
        <?php for ($i = 0; $i < count($rows_array); $i++): ?>
        <div class="list-content">
            <div class="list">
                <div class="list-name"><?php echo $rows_array[$i]['ListName']; ?></div>
            </div>
            <form class="new-item" method="post" autocomplete="off">
                <div class="item-container">
                    <button class="add-item-btn" type="submit" value="add" name="submit">+</button>
                    <input class="item-name" type="text" placeholder="List"></input>
                </div>
            </form>
        </div>
        <?php endfor;?>

        <div class="list-content">
            <form class="list" autocomplete="off" method="POST">
                <input class="list-name" type="text" placeholder="List Title" name="listTitle"></input>
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