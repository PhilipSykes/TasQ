<?php

if(isset($_POST['id'])) {

    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");
    
    $sql = "DELETE FROM Task WHERE TaskID=:taskid";
    $stmt = $db->prepare($sql);
        
    $stmt-> bindParam(':taskid', $_POST['id'], SQLITE3_TEXT);
    
    $stmt->execute();
}