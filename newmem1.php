<?php
include 'conn_mysql.php';
session_start(); //開啟session\
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$email=$_POST['email'];
$pnumber=$_POST['pnumber'];
$sex=$_POST['sex'];
$birthday=$_POST['birthday'];
if($sex=='') $sex='NULL';
if($birthday=='') $birthday='NULL';
$sql="insert into member(Fname, Lname, M_Account, M_password, email, PhoneNumber, sex, birthday, Credit, Class)
    values('".$Fname."', '".$Lname."', '".$username."', '".$password."', '".$email."', '".$pnumber."', '".$sex."', '".$birthday."', 1000, 0);";



?>

<html>
    <body>
    <?php
    if($password!=$password2) {echo '密碼確認不一致,請重新輸入,3秒後回到上一頁';
        header("Refresh:3;url=login1.php");
        echo "<br>";
    }
    else{
        $sqlname = "SELECT * FROM member where M_Account = '$username'";
        $sqlmail = "SELECT * FROM member where email = '$email'";
        $sqlpnum = "SELECT * FROM member where PhoneNumber = '$pnumber'";
        $result = mysqli_query($conn,$sqlname);
        $result2 = mysqli_query($conn,$sqlmail);
        $result3 = mysqli_query($conn,$sqlpnum);
        if($row = mysqli_fetch_row($result))
        {
            echo '帳號重複';
            header("Refresh:2;url=registered1.php");
            echo "<br>";
        }
        else if($row = mysqli_fetch_row($result2))
        {
            echo '電子信箱重複';
            header("Refresh:2;url=registered1.php");
            echo "<br>";
        }
        else if($row = mysqli_fetch_row($result3))
        {
            echo '行動電話重複';
            header("Refresh:2;url=registered1.php");
            echo "<br>";
        }
        else{
            $result=mysqli_query($conn,$sql);
            echo "註冊成功!";
            header("Refresh:2;url=login1.php");
            echo "<br>";
        }
    }
        ?>
    </body>
</html>

