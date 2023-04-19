<?php
session_start();

if( isset($_POST['name']) ) {
    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

    $sql = "UPDATE Workspace SET SpaceName=:spacename WHERE SpaceID=:spaceid";
    $stmt = $db->prepare($sql);
    $stmt-> bindParam(':spacename', $_POST['name'], SQLITE3_TEXT);
    $stmt-> bindParam(':spaceid', $_SESSION['currentWorkspace'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $_SESSION['workspaceName'] = $_POST['name'];
}