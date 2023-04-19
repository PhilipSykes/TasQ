<?php
session_start();

$db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

$sql = 'INSERT INTO Workspace(OwnerName) VALUES(:ownername)';
$stmt = $db->prepare($sql);
$stmt->bindParam(':ownername', $_SESSION['username'] , SQLITE3_TEXT); 
$stmt->execute();

$sql = 'SELECT MAX(SpaceID) FROM Workspace WHERE OwnerName=:ownername';
$stmt = $db->prepare($sql);
$stmt->bindParam(':ownername', $_SESSION['username'] , SQLITE3_TEXT);
$result = $stmt->execute();

$rows_array = [];

while($row = $result->fetchArray()){
    $rows_array[] = $row;
}

$_SESSION['currentWorkspace'] = $rows_array[0]['MAX(SpaceID)'];

$_SESSION['workspaceName'] = null;

header("Location: workspace.php");