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
				include 'mysql_connect.php';
				session_start();
				if(isset($_SESSION['user_name'])){
					echo '<li class="nav-item"><a class="nav-link" href="buy1.php">SHOPPING CART</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="center.php">Hi! <u><strong>'.$_SESSION['user_name'].'</u></strong></a></li><li class="nav-item"><a  class="nav-link" href="logout.php">Logout</a></li>';
				}
				else{
					echo '<li class="nav-item"><a class="nav-link" href="index.php">LOGIN</a></li>';
				}
				?>
		</div>
	</nav>

	<div class="login" id="section1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="title text-center">會員註冊</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
			<div class="col-12" style="text-align:center;"><p><h4>— 有 * 為必填 —</h4></p></div>
			</div>
			<div class="row">
			
                <div class="col-12">
                    <center><div class="box">
					
                    <form method="post" action="newmem1.php">
						<input type="text" name="Fname" placeholder="*姓"><br/>
						<input type="text" name="Lname" placeholder="*名"><br/>
						<input type="text" name="username" placeholder="*請輸入使用者名稱"><br/>
						<input type="password" name="password" placeholder="*請輸入密碼"><br/>
						<input type="password" name="password2" placeholder="*確認密碼"><br/>
						<input type="email" name="email" placeholder="*電子信箱"><br/>
						<input type="text" name="pnumber" placeholder="*電話號碼"><br/><br>
						<input list="sex" name="sex" placeholder="性別"><br/>
								<datalist id="sex">
									<option value="Male">
									<option value="Female">
								</datalist>
						<input type="date" name="birthday" placeholder="生日,請輸入格式:西元年/月/日"><br/>

			<button type="submit" class="loginBtn" name="submit">註冊</button>
                    </form>
</div></center>
                </div>


</form>
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
<?php
   if(isset($_POST['submit'])){
            $this->insert_slogan();
   }
?>


