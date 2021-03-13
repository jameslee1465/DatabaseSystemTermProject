<?php
    include 'conn_mysql.php';
    session_start(); //開啟session
    $sql = "SELECT * FROM gamelist WHERE GameID = $_GET[id]";
    $stmt = $conn->query($sql);
    $result = mysqli_fetch_array($stmt);
?>
<html>
    <head>
        <title>編輯資料</title>
    </head>
    <body>
        <form method="post" action="update2_2.php">
            遊戲ID(不可修改):<input type="text" size="10" name="GameID" id="textfield" value="<?php echo $result[0] ?>"><br>
            類型:<input type="text" size="10" name="GameType" id="textfield" value="<?php echo $result[1] ?>"><br>
            名稱:<input type="text" size="10" name="GameName" id="textfield" value="<?php echo $result[2] ?>"><br>
            封面圖片:<input type="text" size="10" name="Cover" id="textfield" value="<?php echo $result[3] ?>"><br>
            難易度:<input list="Difficulty" name="Difficulty" id="textfield" value="<?php echo $result[4] ?>"><br>
                    <datalist id="Difficulty">
                        <option value="EASY">
                        <option value="NORMAL">
                        <option value="HARD">
                        <option value="EXTREME">
                        <option value="HELL">
                        <option value="None">
                    </datalist>
            大小:<input type="text" size="10" name="Size" id="textfield" value="<?php echo $result[5] ?>"><br>
            發行日期:<input type="date" size="10" name="ReleaseDate" id="textfield" value="<?php echo $result[6] ?>"><br>
            出版公司:<input type="text" size="10" name="Developer" id="textfield" value="<?php echo $result[7] ?>"><br>
            價格:<input type="text" size="10" name="Price" id="textfield" value="<?php echo $result[8] ?>"><br>
            詳細資訊:<textarea name="Detail" rows="10" cols="100"><?php echo $result[9] ?></textarea><br>
            <input type="submit" name="button" id="button" value="確認編輯" />
        </form>
    </body>
</html>
    <!-- <form method="POST" action="man_member.php">
        <input type="submit" value="確認"/>
    </form> -->