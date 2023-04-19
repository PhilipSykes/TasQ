<?php
session_start();

include_once('database-utils.php');

//FetchWorkspace($_SESSION['currentWorkspace'])

$rows_array = FetchLists($_SESSION['currentWorkspace']);
$tasks_array = FetchTasks();

if (isset($_POST['listTitle']))
{
    AddList($_POST['listTitle']);
    $rows_array = FetchLists($_SESSION['currentWorkspace']);
}

if (isset($_POST['submit'])){
    if ($_POST['task']!=null){
        AddTask($_POST['task'], $_POST['id']);
        $tasks_array = FetchTasks();
    }
}

if(isset($_POST['delete'])){
    $rows_array = FetchLists($_SESSION['currentWorkspace']);
    $tasks_array = FetchTasks();
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

<div class="right-click-menu">
    <form method="POST">
        <button name="delete" class="right-click-button" onclick="deletePressed()">Delete</button>
    </form>
</div>

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
                <div class="list-name" id="<?php echo $rows_array[$i]['ListID'];?>"><?php echo $rows_array[$i]['ListName']; ?></div>
            </div>

            <?php 
            for($j = 0; $j < count($tasks_array); $j++){
                if($tasks_array[$j]['ListID']==$rows_array[$i]['ListID']){
            ?>
                <div class="item-container task-container " id="<?php echo $tasks_array[$j]['TaskID'];?>">
                    <form method="post">
                        <input class="checkbox" type="checkbox" id="<?php echo $tasks_array[$j]['TaskID'];?>" <?php if($tasks_array[$j]['Completed'] == 1){ echo "checked";}?>>
                    </form>
                    <div class="item-name"><?php echo $tasks_array[$j]['TaskName']?></div>
                </div>
            <?php } } ?>
            

            <form class="new-item" method="post" autocomplete="off">
                <div class="item-container">
                    <button class="add-item-btn" type="submit" value="add" name="submit">+</button>
                    <input class="item-name" type="text" placeholder="New Task" name="task"></input>
                    <input style="display: none;" name="id" value="<?php echo $rows_array[$i]['ListID'];?>"></input>
                </div>
            </form>

        </div>
        <?php endfor;?>

        <div class="list-content">
            <form class="list" autocomplete="off" method="POST">
                <input class="list-name" type="text" placeholder="New List" name="listTitle"></input>
            </form>
        </div>
    </div>

    
</div>


<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
<script src="workspace.js"></script>
<script src="right-click.js"></script>
</body>
</html>