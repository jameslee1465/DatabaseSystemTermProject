<?php
    include 'conn_mysql.php';
    session_start(); //開啟session\
//新增資料
    $sql ="INSERT INTO member VALUES ( '$_POST[ID]','$_POST[Fname]','$_POST[Lname]','$_POST[M_Account]','$_POST[M_password]','$_POST[email]','$_POST[PhoneNumber]','$_POST[Sex]','$_POST[Birthday]','$_POST[Credit]','$_POST[Class]')";  //新增資料

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();
    header("location:man_member1.php");
?>
<!-- <form method="POST" action="man_member.php">
  <input type="submit" value="確認"/>
</form> -->