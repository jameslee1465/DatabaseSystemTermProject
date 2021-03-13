<?php

/* shop_cart.php
 * 該檔案主要功能為接受使用者來自shop_list.php通過GET方式提交的新增購物車商品資料
 * 並且建立商品的session資料，或者更新session中使用者需要商品的數量
 * 最後跳轉到購物車內容頁buy.php
 * */


include 'mysql_connect.php'; //引入mysql連線方法的檔案
//主要邏輯為：利用session儲存加入購物車的資料，從而來區別每一個人使用者各自的購物車，
//而session儲存的內容是一個二維陣列，格式為array【‘商品的名字’】['商品的具體資料']
//其中商品的具體資料有兩個1、使用者選擇的商品ID 2、使用者選擇的數量
//
session_start(); //開啟session
$GetGame = $_GET["gameid"]; //從GET提交的資料提取goods_name
$GetUser = $_GET["userid"];
$sql = "select * from member where M_Account = '".$GetUser."'";
//echo $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$GetUser = $row[0];
//$sql = "insert into cart values(" . $GetUser.",".$GetGame.",NOW())";
$sql = "SELECT * FROM cart WHERE ( MemberID=" . $GetUser." AND GameID=".$GetGame.")";
$result = mysqli_query($conn, $sql);
$check = mysqli_fetch_array($result);
echo $sql;
if (!is_null($check[0])) {
    //$sql = "insert into cart values(" . $GetUser.",".$GetGame.",NOW(),1)";
    //$sql = "UPDATE cart SET AddTime=NOW(), Amount=Amount+1 WHERE (MemberID=" . $GetUser." AND GameID=".$GetGame.")";
    //=mysqli_query($conn, $sql);
    echo "Do 1";
    echo $sql;
} else { //該商品為新商品新增到購物車
    $sql = "insert into cart (MemberID, GameID) values(" . $GetUser.",".$GetGame.")";
    if(mysqli_query($conn, $sql)){
        echo "Do 2";
        echo $sql;
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    //$sql = "insert into cart values(" . $GetGame.",".$GetUser.")";  //建立查詢對應商品的具體資訊的SQL語句
    
}
header("location:shop_list1.php"); //跳轉到購物車內容介面
?>

