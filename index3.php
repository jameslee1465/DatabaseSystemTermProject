<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<!-- 手機版縮放 -->
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>啪奏遊戲網 Puzzle Game</title>
	<!-- css連結 -->
	<link href="css/style.css" rel="stylesheet">	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="Shortcut Icon" type="image/x-icon" href="img/LOGO.png" />
</head>
<body>

	<!-- JS連結 -->
	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!-- html #0a121c -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#262626;">
		<a class="navbar-brand" href="index3.php"><img src="img/LOGO.png" alt="">　<b style="font-size: 30px;">Puzzle Game</b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto ">
				<li class="nav-item"><a class="nav-link" href="man_member1.php">ACCOUNT</a></li>
				<li class="nav-item"><a class="nav-link" href="game_ana.php">ANALYSIS</a></li>
				<?php
				include 'mysql_connect.php';
				session_start();
				if(isset($_SESSION['user_name'])){
					echo '<li class="nav-item"><a class="nav-link" href="chk_reply2.php">REPLY LETTER</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="center2.php">Hi! <u><strong>'.$_SESSION['Fname'].'</u></strong></a></li><li class="nav-item"><a  class="nav-link" href="logout.php">Logout</a></li>';
				}
				else{
					header("location:login1.php");
					echo '<li class="nav-item"><a class="nav-link" href="login1.php">LOGIN</a></li>';
				}
				?>
		</div>
	</nav>

	<div class="banner">
		<img src="img/mbanner.jpg" class="d-block w-100" alt="...">
	</div>
	
	<div class="about" id="section1">
		<div class="container ">
			<div class="row">
				<div class="col-12">
					<p class="title text-center">ANNOUNCEMENT</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						</ol>
						<!-- 輪播內容 -->
						<div class="carousel-inner">
						  <div class="carousel-item active">
							<img src="img/mm1.png" height="450px" class="d-block w-100" alt="...">
						  </div>
						  <div class="carousel-item">
							<img src="img/mm2.png" height="450px" class="d-block w-100" alt="...">
						  </div>
						</div>
						<!-- 左右箭頭 -->
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						  <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						  <span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<div class="col-12 story text-center">
					<span>本月優秀員工 ─ 邱灰鞋</span>
					<p>	
						你個位啊，<br>
						看看人家自願加班工作還不領加班費、不補假，<br>
						只為帶來公司更高的收益，<br>
						這付出的精神值得我們學習。<br>
						<br>
						所以，<br>
						下個月起，<br>
						全公司加班不得要求補假、加班費。<br>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="product" id="section2">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="title text-center">MANAGEMENT</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<a href="center2.php">
							<div class="pic">
								<img src="https://bit.ly/2JNgTiu">
							</div>
						</a>
						<p class="product_name text-right">個人資料 /<br> INFORMATION</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<a href="man_member1.php">
							<div class="pic">
								<img src="https://bit.ly/2KTYpNU">
							</div>
						</a>
						<p class="product_name text-right">帳號管理 /<br> ACCOUNT</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<a href="chk_reply2.php">
							<div class="pic">
								<img src="https://bit.ly/3rVVdle">
							</div>
						</a>
						<p class="product_name text-right">信件回覆 /<br> REPLY LETTER</p>
					</div>
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



