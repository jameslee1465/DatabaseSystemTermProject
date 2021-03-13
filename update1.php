<?php
    include 'conn_mysql.php';
    session_start(); //開啟session
    $sql = "SELECT * FROM member WHERE ID = $_GET[id]";
    $stmt = $conn->query($sql);
    $result = mysqli_fetch_array($stmt);
?>
<html>
    <head>
        <title>編輯資料</title>
    </head>
    <body>
        <form method="post" action="update1_1.php">
            ID(不能編輯):<input type="text" size="10" id="textfield" name="ID" value=<?php echo $result[0] ?>><br>
            名:<input type="text" size="10" id="textfield" name="Fname" value=<?php echo $result[1] ?>><br>
            姓:<input type="text" size="10" id="textfield" name="Lname" value=<?php echo $result[2] ?>><br>
            帳號:<input type="text" size="10" id="textfield" name="M_Account" value=<?php echo $result[3] ?>><br>
            密碼:<input type="text" size="10" id="textfield" name="M_password" value=<?php echo $result[4] ?>><br>
            電郵:<input type="email" size="10" id="textfield" name="email" value=<?php echo $result[5] ?>><br>
            電話號碼:<input type="text" size="10" id="textfield" name="PhoneNumber" value=<?php echo $result[6] ?>><br>
            性別:<input list="Sex" id="textfield" name="Sex" value=<?php echo $result[7] ?>><br>
                    <datalist id="Sex">
                        <option value="Male">
                        <option value="Female">
                        <option value="NULL">
                    </datalist>
            生日:<input type="date" size="10" id="textfield" name="Birthday" value=<?php echo $result[8] ?>><br>
            點數:<input type="text" size="10" id="textfield" name="Credit" value=<?php echo $result[9] ?>><br>
            等級:<input type="text" size="10" id="textfield" name="Class" value=<?php echo $result[10] ?>><br>
            <input type="submit" name="button" id="button" value="確認編輯">
        </form>
    </body>
</html>
    <!-- <form method="POST" action="man_member.php">
        <input type="submit" value="確認"/>
    </form> -->