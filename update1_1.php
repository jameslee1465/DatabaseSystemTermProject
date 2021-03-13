<?php
    include 'conn_mysql.php';
    session_start(); //開啟session
    $sql ="UPDATE member SET Fname='$_POST[Fname]',Lname='$_POST[Lname]',M_Account='$_POST[M_Account]',M_password='$_POST[M_password]',email='$_POST[email]',PhoneNumber='$_POST[PhoneNumber]',Sex='$_POST[Sex]',Birthday='$_POST[Birthday]',Credit='$_POST[Credit]',Class='$_POST[Class]' WHERE ID=$_POST[ID]";   //修改資料
    
    if ($conn->query($sql) === TRUE) {
        echo "ok";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    echo "$_POST[Fname]";
    header("location:man_member1.php");
?>