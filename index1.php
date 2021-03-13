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
		<a class="navbar-brand" href="#"><img src="img/LOGO.png" alt="">　<b style="font-size: 30px;">Puzzle Game</b></a>
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
					echo '<li class="nav-item"><a class="nav-link" href="reply.php">CONTACT US</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="center.php">Hi! <u><strong>'.$_SESSION['Fname'].'</u></strong></a></li><li class="nav-item"><a  class="nav-link" href="logout.php">Logout</a></li>';
				}
				else{
					echo '<li class="nav-item"><a class="nav-link" href="login1.php">LOGIN</a></li>';
				}
				?>
		</div>
	</nav>

	<div class="banner">
		<img src="img/banner.jpg" class="d-block w-100" alt="...">
	</div>
	
	<div class="about" id="section1">
		<div class="container ">
			<div class="row">
				<div class="col-12">
					<p class="title text-center">NEWS</p>
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
							<a href="game_detail.php?echoid=5"><img src="img/game1.jpg" height="450px" class="d-block w-100" alt="..."></a>
						  </div>
						  <div class="carousel-item">
							<a href="game_detail.php?echoid=1"><img src="img/header.jpg" height="450px" class="d-block w-100" alt="..."></a>
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
					<span>來看看最新上架的遊戲吧！</span>
					<p>	
						現在，<br>
						您可以購買Puzzle Game最新上架的遊戲，<br>
						透過Puzzle Game盡情享受遊戲帶來的全新體驗。<br>
						<br>
						您也可以透過遊戲，<br>
						跟好友來一場頂尖的益智對決，<br>
						比賽誰能最快破解完全部關卡。<br>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="product" id="section2">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="title text-center">CATEGORIES</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<a href="category.php">
							<div class="pic">
								<img src="img/s1udo.png">
							</div>
						</a>
						<p class="product_name text-right">數獨 /<br> SUDOKU</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<a href="category.php">
							<div class="pic">
								<img src="img/hanjie.png">
							</div>
						</a>
						<p class="product_name text-right">數織 /<br> HANJIE</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<a href="category.php">
							<div class="pic">
								<img src="img/g1gicon.png">
							</div>
						</a>
						<p class="product_name text-right">其他 /<br> OTHER</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="contact" id="section5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<p class="title text-center">COMMENT</p>
					<hr class="title_line_line">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="card h-100">
						<div class="card-body">
						  <h5 class="card-title">好遊戲</h5>
						  <h6 class="card-subtitle mb-2 text-muted">Game: Sudoku 1465</h6>
						  <h6 class="card-subtitle mb-2 text-muted">ID: james(★★★★)</h6>
						  <p class="card-text">好玩:)</p>
						</div>
					  </div>
				</div>
				<div class="col-md-4">
					<div class="card h-100">
						<div class="card-body">
						  <h5 class="card-title">真心推薦</h5>
						  <h6 class="card-subtitle mb-2 text-muted">Game: Lynn 520</h6>
						  <h6 class="card-subtitle mb-2 text-muted">ID: tsaibrother(★★★★★)</h6>
						  <p class="card-text">精神上的享受！以後再也不會無聊。還有壹個特別的小技巧告訴大家。tsaibrother.com這裏購買的衣服。可以滿V。不用自己充。終於收到我需要的寶貝了。東西很好。價美物廉。說實在這是我來讓我最滿意的一次購物。無論是掌櫃的態度還是對物品。我都非常滿意的。掌櫃態度很專業熱情。有問必答。回復也很快。我問了不少問題。他都不覺得煩。</p>
						</div>
					  </div>
				</div>
				<div class="col-md-4">
					<div class="card h-100">
						<div class="card-body">
						  <h5 class="card-title">垃圾遊戲</h5>
						  <h6 class="card-subtitle mb-2 text-muted">Game: Hanjie 7414</h6>
						  <h6 class="card-subtitle mb-2 text-muted">ID: GGrunrundela(★)</h6>
						  <p class="card-text">嘔嘔嘔嘔嘔 這什麼垃圾遊戲 玩ㄉ都八卦肥宅484 嘔嘔嘔嘔嘔。</p>
						</div>
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



