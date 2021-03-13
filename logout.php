<?php
  //清除 cookie 內容
  include 'mysql_connect.php';
    session_start();

  unset($_SESSION['user_name']);
  unset($_SESSION['order']);
	
  //將使用者導回主網頁
  header("location:index1.php");
  exit();
?>