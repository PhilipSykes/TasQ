<?php

function SignUp($fname , $lname, $username, $email, $password) {

    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

    $sql = "SELECT Username FROM User WHERE Username=:uname";
    $stmt = $db->prepare($sql);
    $stmt-> bindParam(':uname', $username, SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];

    while($row = $result->fetchArray()){
        $rows_array[] = $row;
    }

    if($rows_array == null){

        //inserts into user table

        $sql = 'INSERT INTO User(Username, Email, FirstName, LastName, PicPath) VALUES(:username, :email, :firstname, :lastname, :picpath)';
        $stmt = $db->prepare($sql);

        $defaultPic = "ProfilePic/default.png";

        $stmt->bindParam(':username', $username , SQLITE3_TEXT);
        $stmt->bindParam(':email', $email , SQLITE3_TEXT);  
        $stmt->bindParam(':firstname', $fname , SQLITE3_TEXT);  
        $stmt->bindParam(':lastname', $lname , SQLITE3_TEXT); 
        $stmt->bindParam(':picpath', $defaultPic , SQLITE3_TEXT);  

        $stmt->execute();

        // inserts into auth table
        $sql = 'INSERT INTO UserAuth(Username, Password) VALUES(:username, :password)';
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':username', $username , SQLITE3_TEXT);
        $stmt->bindParam(':password', $password , SQLITE3_TEXT);

        $stmt->execute();
    }
    else{
        return "Username is already in use";
    }
}


function Login($username, $password) {

    $db = new SQLite3("/Applications/XAMPP/xamppfiles/data/TasQ.db");

    $stmt = $db->prepare('SELECT * FROM UserAuth WHERE Username=:uname AND Password=:passwrd');

    $stmt->bindParam(':uname', $username , SQLITE3_TEXT);
    $stmt->bindParam(':passwrd', $password , SQLITE3_TEXT);

    $result = $stmt->execute();

    $rows_array = [];

    while($row = $result->fetchArray()){
        $rows_array[] = $row;
    }
    return $rows_array;
}