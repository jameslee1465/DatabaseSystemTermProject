<?php
    include 'conn_mysql.php';
    session_start(); //開啟session\
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>會員回覆</title>
</head>
<h1>會員反應內容</h1><br>
<table border=1  cellpadding=5>
            <tr>
                <td style="font-size: 120%;color: blue;text-align: center">編號</td>
                <td style="font-size: 120%;color: blue;text-align: center">回覆時間</td>
                <td style="font-size: 120%;color: blue;text-align: center">會員名字</td>
                <td style="font-size: 120%;color: blue;text-align: center">主旨</td>
                <td style="font-size: 120%;color: blue;text-align: center">內容</td>
            </tr>
            
            <?php
                $sql="select * from issue WHERE ID=$_GET[id]";
                $stmt = $conn->query($sql)
            ?>
            <?php
                for($i = 1; $i <= mysqli_num_rows($stmt);$i++){
                $result = mysqli_fetch_array($stmt)
            ?>
            <tr>
                <td><?php echo $result[0] ?></td> 
                <td><?php echo $result[1] ?></td> 
                <td><?php echo $result[2] ?></td> 
                <td><textarea name="Detail" rows="5" cols="30"><?php echo $result[3] ?></textarea></td>
                <td><textarea name="Detail" rows="5" cols="70"><?php echo $result[4] ?></textarea></td>
            </tr>
            <?php
            }
            ?>
            </table>
            <a href="chk_reply2.php">返回</a>
	</body>
</html>