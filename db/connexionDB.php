<?php
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbinstruments";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        echo "Connection failed: ";
        exit();
    }else{
        echo "Connected successfully";
        
    }
    
?>