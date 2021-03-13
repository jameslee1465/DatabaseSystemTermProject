<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<!-- 手機版縮放 -->
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>啪奏遊戲網 Puzzle Game | 個人資料</title>
	<!-- css連結 -->
	<link href="css/tyle.css" rel="stylesheet">	
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
    <div class="product" id="section1">
		<div class="container">
		<form name="view" method="POST" action="index3.php">
			<input type="submit" name="check" value="↶ BACK" />
		</form>
			<div class="row">
				<div class="col-12">
					<p class="title text-center">INFORMATION</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
			<div class='col-md-8'><h5>
			<?php
			$sql = "select * from member where M_Account='".$_SESSION['user_name']."'";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo "ID: ".$row[0]."<br>";
				echo "Name: ".$row[1]." ".$row[2]."<br>";
				echo "Account: ".$row[3]."<br>";
				echo "Password: ".$row[4]."<br>";
				echo "E-mail: ".$row[5]."<br>";
				echo "Phone Number: ".$row[6]."<br>";
				echo "Sex: ".$row[7]."<br>";
				echo "Birthday: ".$row[8]."<br>";
				echo "Credit: $".$row[9]."<br>";
				echo "Class: ".$row[10]."<br>";
			}
			?>

            </h5></div>
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