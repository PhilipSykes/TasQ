<?php

session_start();

$db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

$sql = "DELETE FROM UserAuth WHERE Username=:username";
$stmt = $db->prepare($sql);
    
$stmt-> bindParam(':username', $_SESSION['username'], SQLITE3_TEXT);

$stmt->execute();

$sql = "DELETE FROM User WHERE Username=:username";
$stmt = $db->prepare($sql);
    
$stmt-> bindParam(':username', $_SESSION['username'], SQLITE3_TEXT);

$stmt->execute();


$sql = "SELECT SpaceID FROM Workspace WHERE OwnerName=:ownername";
$stmt = $db->prepare($sql);
    
$stmt-> bindParam(':ownername', $_SESSION['username'], SQLITE3_TEXT);

$result = $stmt->execute();

session_destroy();

header("Location: /TasQ/");