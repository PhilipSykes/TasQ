<?php

session_start();

$_SESSION['currentWorkspace'] = $_GET["id"];

$db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

$sql = 'SELECT SpaceName FROM Workspace WHERE SpaceID=:spaceid';

$stmt = $db->prepare($sql);
$stmt->bindParam(':spaceid', $_SESSION['currentWorkspace'] , SQLITE3_TEXT);
$result = $stmt->execute();

$rows_array = [];

while($row = $result->fetchArray()){
    $rows_array[] = $row;
}

$_SESSION['workspaceName'] = $rows_array[0]['SpaceName'];

header("Location: workspace.php");