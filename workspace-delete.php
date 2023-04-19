<?php

if(isset($_POST['id'])) {

    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

    $sql = "DELETE FROM Workspace WHERE SpaceID=:spaceid";
    $stmt = $db->prepare($sql);
        
    $stmt-> bindParam(':spaceid', $_POST['id'], SQLITE3_TEXT);
    
    $stmt->execute();



    $sql = "SELECT ListID FROM List WHERE SpaceID=:spaceid";
    $stmt = $db->prepare($sql);
        
    $stmt-> bindParam(':spaceid', $_POST['id'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];

    while($row = $result->fetchArray()){
        $rows_array[] = $row;
    }
    

    if($rows_array!=null){
        $sql = "DELETE FROM List WHERE SpaceID=:spaceid";
        $stmt = $db->prepare($sql);
        
        $stmt-> bindParam(':spaceid', $_POST['id'], SQLITE3_TEXT);
    
        $stmt->execute();

        for($i = 0; $i < count($rows_array); $i++){

            $sql = "SELECT TaskID FROM Task WHERE ListID=:listid";
            $stmt = $db->prepare($sql);
                
            $stmt-> bindParam(':listid', $rows_array[$i]['ListID'], SQLITE3_TEXT);
        
            $result = $stmt->execute();
        
            $task_array = [];
        
            while($row = $result->fetchArray()){
                $task_array[] = $row;
            }
        
            if($task_array!=null){
                $sql = "DELETE FROM Task WHERE ListID=:listid";
                $stmt = $db->prepare($sql);
                
                $stmt-> bindParam(':listid', $rows_array[$i]['ListID'], SQLITE3_TEXT);
            
                $stmt->execute();
            }
        
        
            $sql = "DELETE FROM List WHERE ListID=:listid";
            $stmt = $db->prepare($sql);
                
            $stmt-> bindParam(':listid', $rows_array[$i]['ListID'], SQLITE3_TEXT);
            
            $stmt->execute();
        }
    }
}