<?php

if(isset($_POST['id'])) {


    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

    $sql = "SELECT TaskID FROM Task WHERE ListID=:listid";
    $stmt = $db->prepare($sql);
        
    $stmt-> bindParam(':listid', $_POST['id'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];

    while($row = $result->fetchArray()){
        $rows_array[] = $row;
    }

    if($rows_array!=null){
        $sql = "DELETE FROM Task WHERE ListID=:listid";
        $stmt = $db->prepare($sql);
        
        $stmt-> bindParam(':listid', $_POST['id'], SQLITE3_TEXT);
    
        $stmt->execute();
    }


    $sql = "DELETE FROM List WHERE ListID=:listid";
    $stmt = $db->prepare($sql);
        
    $stmt-> bindParam(':listid', $_POST['id'], SQLITE3_TEXT);
    
    $stmt->execute();
}