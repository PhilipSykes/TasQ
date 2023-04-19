<?php
session_start();

if( isset($_POST['name']) ) {
    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

    $sql = "INSERT INTO List(SpaceID, ListName) VALUES(:spaceid, :listname)";

    $stmt = $db->prepare($sql);
    
    $stmt-> bindParam(':listname', $_POST['name'], SQLITE3_TEXT);
    $stmt-> bindParam(':spaceid', $_SESSION['currentWorkspace'], SQLITE3_TEXT);

    $stmt->execute();
}