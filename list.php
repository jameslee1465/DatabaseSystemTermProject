<?php
include 'mysql_connect.php';
session_start();
?>
<br>
<a style="font-size: 150%;color: red" >當前使用者：
    <?php
    if(isset($_SESSION['user_name']))
    echo $_SESSION['user_name'] . "     ";
    else
    echo '未登入';
    ?>
    <a href="login.php">(登出)</a>
    <?php
    
    ?> </a>
	
	<table border="1"  height="400px" width="400px">    
	<td style="font-size: 120%;color: blue;text-align: center">S/N</td>
    <td style="font-size: 120%;color: blue;text-align: center">GameID</td>
    <td style="font-size: 120%;color: blue;text-align: center">Price</td>
<?php
//查詢資料庫，並處理結果集
$sql = "SELECT * FROM `order_list` WHERE `Member_id` = '".$_SESSION['user_name']."' ORDER BY `order_list`.`S/N` ASC";
$result = mysqli_query( $conn,$sql);
while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td width="50px"><?php echo $row[1] ?></td>
            <td ><?php echo $row[0] ?></td>
            <td ><?php echo $row[2] ?></td>

        </tr>
<?php } 
?>
<form name="view" method="POST" action="shop_list.php">
    <input type="submit" name="check" value="返回" />
</form>