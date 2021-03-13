<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<!-- 手機版縮放 -->
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>啪奏遊戲網 Puzzle Game | 商品</title>
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
					echo '<li class="nav-item"><a class="nav-link" href="reply.php">CONTACT US</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="center.php">Hi! <u><strong>'.$_SESSION['Fname'].'</u></strong></a></li><li class="nav-item"><a  class="nav-link" href="logout.php">Logout</a></li>';
				}
				else{
					echo '<li class="nav-item"><a class="nav-link" href="index.php">LOGIN</a></li>';
					header("location:login1.php");
				}
				?>
		</div>
	</nav>

	<div class="product" id="section1">
		<div class="container">
		<form name="view" method="POST" action="shop_list1.php">
			<input type="submit" name="check" value="↶ BACK" />
		</form>
			<div class="row">
				<div class="col-12">

					<hr class="title_line">
				</div>
			</div>
			<div class="row">
					<?php
                    //查詢資料庫，並處理結果集
                    $GetID = $_GET["echoid"];
                    //$arr = $_SESSION['games'];
                    $sql = "select GameID from gamelist where GameID = ".$GetID." limit 1";
                    $result = mysqli_query( $conn,$sql);
                    if (!is_null($result)){

                        $sql = "select * from gamelist where GameID=".$GetID." order by `GameID`";
                        $result = mysqli_query( $conn,$sql);
                        $row = mysqli_fetch_array($result);
						
							echo '<div class="col-md-4">';
                                echo '<img src=\''.$row[3].'\'>';
                                echo '<b>Category: '.$row[1].'<br>';
                                echo 'Developer: '.$row[7].'<br>';
								echo 'Release: '.$row[6].'<br>';
								echo 'Difficulty: '.$row[4].'<br>';
								echo 'Size: '.$row[5].'<br>';
                                echo 'Price: $'.$row[8].'</b><br>';
								?>								<?php
								$sqll = "select * from member where M_Account = '".$_SESSION['user_name']."'";
								$resul = mysqli_query($conn, $sqll);
								$roww = mysqli_fetch_array($resul);
								$GetUser = $roww[0];
								//$sql = "insert into cart values(" . $GetUser.",".$GetGame.",NOW())";
								$sqll = "SELECT * FROM orderlist WHERE ( MemberID=" . $GetUser." AND GameID=".$row[0].")";
								$resul = mysqli_query($conn, $sqll);
								$check = mysqli_fetch_array($resul);
								if (isset($check[0])) {?>
									<input style='width:100%' type="submit" name='download' value="Download" onClick="javascript:window.open('download.html','WindowOpen2','toolbar=no,location=no,directories=no,width=500,height=300')" />
								<?php
							}else{?>
								<input style='width:100%' type = 'button' onclick="javascript:location.href='shop_cart1.php?gameid=<?php echo $row[0]; ?>&userid=<?php echo $_SESSION['user_name'];?>'" value='BUY'></input>
								<?php }
									?>
								<?php
                            echo '</div>';
                            echo '<div class="col-md-8">';
                            echo '<h1>'.$row[2].'</h1>';
                            echo $row[9];
							echo '</div>';
                    } 
                    else{
                        echo '<div class="col-12"><center>Error: Can\'t Find GameID = '.$GetID.'</center></div>';
                    }
					?>
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