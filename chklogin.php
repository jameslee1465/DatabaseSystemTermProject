<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<!-- 手機版縮放 -->
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>啪奏遊戲網 Puzzle Game | 會員登入</title>
	<!-- css連結 -->
	<link href="css/login_style.css" rel="stylesheet">	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="Shortcut Icon" type="image/x-icon" href="img/LOGO.png" />
</head>
<body>

	<!-- JS連結 -->
	<script src="js/jQuery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- html #0a121c -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#262626;">
		<a class="navbar-brand" href="index1.php"><img src="img/LOGO.png" alt="">　<b style="font-size: 30px;">Puzzle Game</b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto ">
				<li class="nav-item"><a class="nav-link" href="category.php">CATEGORIES</a></li>
				<li class="nav-item"><a class="nav-link" href="shop_list1.php">PRODUCT</a></li>
				<?php
					echo '<li class="nav-item"><a class="nav-link" href="login1.php">LOGIN</a></li>';
				?>
		</div>
	</nav>	

    <div class="login" id="section1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="title text-center">會員登入</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
                <div class="col-12">
<center><h2>Signing In...</h2></center><div><pre name="code" class="php"><?php

/* check_login.php
 * 該檔案主要功能為驗證登入使用者資訊是否正確
 * 並且根據正確跳轉到商品展示頁shop_list.php
 * 如果不正確則跳轉到登入頁面login.php */


    include 'mysql_connect.php';
    session_start(); //開啟session
    $user_name = $_POST['user_name'];
    $user_pwd = $_POST['user_pwd'];
    //查詢資料庫，並先驗證使用者名稱是否正確，若正確再進行下一步驗證密碼

    $user_name_sql = 'select * from `member` where `M_Account` = "' . $user_name . '"';
    $result = mysqli_query($conn,$user_name_sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        if ($row[4] == $user_pwd) {
            $_SESSION['id']=$row[0];
            $_SESSION['Fname'] =$row[1];
            $_SESSION['Lname'] =$row[2];
            $_SESSION['user_name']=$row[3];
            $_SESSION['user_pass']=$row[4];
            $_SESSION['email']=$row[5];
            $_SESSION['pnum']=$row[6];
            $_SESSION['sex']=$row[7];
            $_SESSION['bd']=$row[8];
            $_SESSION['credit']=$row[9];
            $_SESSION['class']=$row[10]; //把使用者資料新增到session中
			$_SESSION['order'] = 0;
            echo '<script>swal("Success", "登入成功!", "success");</script>';
            if($row[10]==1)
			{
                Header("Refresh:1;index2.php");
			}
            else if($row[10]==2)
            {
                Header("Refresh:1;index3.php");
            }
			else
			{
			Header("Refresh:1;index1.php ");
			}
        } else {
            echo '密碼錯誤 請重新登入';
            echo '<script>swal("Oops", 密碼錯誤!", "error");</script>';

            Header("Refresh:2;login1.php ");
        }
    } else {
        echo '<script>swal("Oops", "使用者不存在!", "error");</script>';
        Header("Refresh:2;login1.php");
    }
?>
</div>
			</div>
            </div>
			</div>

<footer>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p>© 2021 Puzzle Game All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>

	<button type="button" id="BackTop" class="toTop-arrow"></button>
	<script>
	$(function(){
		$('#BackTop').click(function(){ 
			$('html,body').animate({scrollTop:0}, 333);
		});
		$(window).scroll(function() {
			if ( $(this).scrollTop() > 300 ){
				$('#BackTop').fadeIn(222);
			} else {
				$('#BackTop').stop().fadeOut(222);
			}
		}).scroll();
	});
	</script>

<script>
	function myFunction() {
	   var element = document.body;
	   element.classList.toggle("dark-mode");
	}
	</script>

	<script>
		function myFunction() {
   var element = document.body;
   element.classList.toggle("light-mode");
}
// check for saved 'darkMode' in localStorage
let lightMode = localStorage.getItem("light-mode"); 

const lightModeToggle = document.querySelector("#light-mode-toggle");

const enableLightMode = () => {
  // 1. Add the class to the body
  document.body.classList.add("light-mode");
  // 2. Update darkMode in localStorage
  localStorage.setItem("light-mode", "enabled");
}

const disableLightMode = () => {
  // 1. Remove the class from the body
  document.body.classList.remove("light-mode");
  // 2. Update darkMode in localStorage 
  localStorage.setItem("light-mode", null);
}
 
// If the user already visited and enabled darkMode
// start things off with it on
if (lightMode === "enabled") {
  enableLightMode();
}

// When someone clicks the button
lightModeToggle.addEventListener("click", () => {
  // get their darkMode setting
  lightMode = localStorage.getItem("darkMode"); 
  
  // if it not current enabled, enable it
  if (lightMode !== "enabled") {
    enableLightMode();
  // if it has been enabled, turn it off  
  } else {  
    disableLightMode(); 
  }
});
	</script>
	
</body>
</html>