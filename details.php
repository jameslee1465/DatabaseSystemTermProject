<?php
    include 'conn_mysql.php';
    session_start(); //開啟session\

    $sql ="SELECT * FROM gamelist WHERE GameID=$_GET[id]";  //查看Detail
    if ($stmt = $conn->query($sql)){
        while($result = mysqli_fetch_object($stmt)){
            echo $result->Detail ;
        }
        
    }
    // if ($conn->query($sql) === TRUE) {
    //     echo "Record of GameID = $_GET[id] has been deleted successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //   }
?>

 <a href="man_game1.php">返回</a>
