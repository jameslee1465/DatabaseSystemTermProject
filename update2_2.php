<?php
    include 'conn_mysql.php';
    session_start(); //開啟session
    $sql ="UPDATE gamelist SET GameType='$_POST[GameType]',GameName='$_POST[GameName]',Cover='$_POST[Cover]',Difficulty='$_POST[Difficulty]',Size='$_POST[Size]',ReleaseDate='$_POST[ReleaseDate]',Developer='$_POST[Developer]',Price='$_POST[Price]',Detail='$_POST[Detail]' WHERE GameID=$_POST[GameID]";   //修改資料
    // $Detail="";
    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //   }
    // if (empty($_POST["Detail"])) {
    //     $Detail = "";
    //   } else {
    //     $Detail = test_input($_POST["Detail"]);
    //   }
    if ($conn->query($sql) === TRUE) {
        echo "ok";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header("location:man_game1.php");
?>
