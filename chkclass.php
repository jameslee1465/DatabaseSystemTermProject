<?php
    include 'mysql_connect.php';
    session_start(); //開啟session
    if($_SESSION['class']==1){
        Header("Refresh:1;manage.php");
    }
    else if($_SESSION['class']==2)
    {
        Header("Refresh:1;manage1.php");
    }
    else{
        Header("Refresh:1;member.php ");
    }

?>