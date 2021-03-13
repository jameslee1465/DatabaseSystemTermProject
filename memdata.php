<?php
    include 'conn_mysql.php';
    session_start(); //開啟session

?>
<html>
    <head>
        <title>會員個人資料</title>
    </head>
    <body>
        會員ID:<?php echo $_SESSION['id'] ?><br>
        名:<?php echo $_SESSION['Fname'] ?><br>
        姓:<?php echo $_SESSION['Lname'] ?><br>
        帳號:<?php echo $_SESSION['user_name'] ?><br>
        密碼:<?php echo $_SESSION['user_pass'] ?><br>
        電郵:<?php echo $_SESSION['email'] ?><br>
        電話號碼:<?php echo $_SESSION['pnum'] ?><br>
        性別:<?php echo $_SESSION['sex'] ?><br>
        生日:<?php echo $_SESSION['bd'] ?><br>
        點數:<?php echo $_SESSION['credit'] ?><br>
        等級:<?php echo $_SESSION['class'] ?><br>
        <a href="chkclass.php">返回</a>
    </body>
</html>
