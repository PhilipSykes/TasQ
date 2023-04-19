<?php 


function fetchOwnedWorkspace() {

$db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

$sql = 'SELECT SpaceName FROM Workspace WHERE OwnerName=:ownername';
$stmt = $db->prepare($sql);

$stmt->bindParam(':ownername', $_SESSION['username'] , SQLITE3_TEXT);
$result = $stmt->execute();

$rows_array = [];

while($row = $result->fetchArray()){
    $rows_array[] = $row;
}

return $rows_array;
}