<?php

function CreateUser(){

    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $userID = 1235;
    $path = "";

    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/tasq.db");
    $sql = 'INSERT INTO User(UserID, Username, FirstName, LastName, Email, PicPath) VALUES (:userID, :username, :firstName, :lastName, :email, :picPath)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':userID', $userID , SQLITE3_TEXT); 
    $stmt->bindParam(':username', $_POST['username'], SQLITE3_TEXT); 
    $stmt->bindParam(':firstName', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lastName', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':picPath', $path, SQLITE3_TEXT);

    $stmt->execute();
    
    $sql = 'INSERT INTO UserAuth(UserID, Password) VALUES (:userID, :password)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':userID', $userID , SQLITE3_TEXT); 
    $stmt->bindParam(':password', $hashed_password , SQLITE3_TEXT); 

    $stmt->execute();
}

function LogIn(){

    
    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/tasq.db");

    //Username
    $stmt = $db->prepare('SELECT UserID FROM User WHERE username=:Username');

    $stmt-> bindParam(':Username', $_POST['username'], SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];
    while($row = $result->fetchArray()){
        $rows_array[] = $row;
    }

    if($rows_array!=null){
        $UserID =$rows_array[0]['UserID'];
    }
    else{
        return null;
    }

    //Password
    $stmt = $db->prepare('SELECT Password FROM UserAuth WHERE UserID=:userID');

    $stmt-> bindParam(':userID', $UserID, SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array2 = [];
    while($row = $result->fetchArray()){
        $rows2_array[] = $row;
    }

    echo $rows_array2[0]['Password'];

    if($rows_array2!=null){
        $password = $rows_array2[0]['Password'];
    }
    else{
        return null;
    }

    //Checking
    if(password_verify($_POST['Password'], $password)){
        return true;
    }
}