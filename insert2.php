<?php
    include 'conn_mysql.php';
    session_start(); //開啟session\
//新增資料
    $sql ="INSERT INTO gamelist (GameType, GameName, Cover, Difficulty, Size, ReleaseDate, Developer, Price, Detail) VALUES ( '$_POST[GameType]','$_POST[GameName]','$_POST[Cover]','$_POST[Difficulty]','$_POST[Size]','$_POST[ReleaseDate]','$_POST[Developer]','$_POST[Price]','$_POST[Detail]')";  //新增資料

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();
    header("location:man_game1.php");
?>
<!-- <form method="POST" action="man_member.php">
  <input type="submit" value="確認"/>
</form> -->