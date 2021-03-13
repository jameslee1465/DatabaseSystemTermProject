<?php
    include 'mysql_connect.php';
    session_start(); //開啟session
    $Fname=$_SESSION['Fname'];
    $Title=$_POST['Title'];
    $Content=$_POST['Content'];
    $sql="insert into issue(MemberName, Title, Content)
        values('".$Fname."','".$Title."', '".$Content."');";
    $result = mysqli_query($conn,$sql);
?>

<html>
    <body>
    
    <?php
    //  if($Title>50) {echo '主旨過長,2秒後回到上一頁';
    //      header("Refresh:2;url=reply.php");
    //      echo "<br>";
    //  }
    //  else if($Content>500){
    //      echo '主旨過長,2秒後回到上一頁';
    //      header("Refresh:2;url=reply.php");
    //      echo "<br>";
    //  }
     //else{
        echo "<script>alert('傳送成功!')</script>";
        Header("Refresh:1;reply.php");
     //} 
        ?>
    </body>
</html>