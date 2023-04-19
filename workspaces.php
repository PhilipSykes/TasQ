<?php
session_start();

include_once('database-utils.php');

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

<div class="right-click-menu">
    <form method="POST">
        <button name="delete" class="right-click-button" onclick="deletePressed()">Delete</button>
    </form>
</div>

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


        <?php
        include_once('fetchworkspaces.php');
        
        $ownedWorkspaceArray = fetchOwnedWorkspace();

        for ($i = 0; $i < count($ownedWorkspaceArray); $i++):
        ?>

        <a class="workspace" href="loadData.php?id=<?php echo $ownedWorkspaceArray[$i]['SpaceID']; ?>" id="<?php echo $ownedWorkspaceArray[$i]['SpaceID']; ?>">
        <?php  
        if($ownedWorkspaceArray[$i]['SpaceName'] != null){
            echo $ownedWorkspaceArray[$i]['SpaceName'];
        }
        else {
            ?>
            <div class="unnamed">
            <?php
            echo "Unnamed Workspace";
            ?>
            </div>
            <?php
        }
        ?>
        </a>

        <?php endfor; ?>


        <a href="create-workspace.php" class="workspace-add">+</a>
    </div>
</div>


<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
<script src="right-click.js"></script>

</body>
</html>