<?php

/* mysql_connect.php
 * 該檔案主要功能為mysql連線
 *  */


    //連線資料庫
    $conn =mysqli_connect("localhost:5566","root", "");
    mysqli_select_db( $conn,'puzzle_game');
    $conn_rs = mysqli_query($conn,'set names utf8');
    if ($conn_rs)
    //echo "mysql連線成功!";
        echo '';
    else
        die('mysql連線錯誤' . mysqli_error($conn));
?>