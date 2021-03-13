<?php
    $servername='localhost:5566';
    $user='root';
    $pass='';
    $db='puzzle_game';
    $conn=new mysqli($servername,$user,$pass,$db) or die('field');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_query($conn,"set names utf8");
?>