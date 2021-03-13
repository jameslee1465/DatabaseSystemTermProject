<?php
    include 'conn_mysql.php';
    session_start(); //開啟session\

    $sql ="DELETE FROM member WHERE ID=$_GET[id]";  //刪除資料

    if ($conn->query($sql) === TRUE) {
        echo "Record of ID = $_GET[id] has been deleted successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();
    header("location:man_member1.php");
?>
