<?php

if( isset($_POST['id']) ) {
    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

    $sql = "UPDATE Task SET Completed=:completed WHERE TaskID=:taskid";
    $stmt = $db->prepare($sql);
    $stmt-> bindParam(':taskid', $_POST['id'], SQLITE3_TEXT);
    $stmt-> bindParam(':completed', $_POST['value'], SQLITE3_TEXT);

    $result = $stmt->execute();
}