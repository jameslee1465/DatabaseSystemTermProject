<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<!-- 手機版縮放 -->
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>啪奏遊戲網 Puzzle Game | 購物</title>
	<!-- css連結 -->
	<link href="css/tyle.css" rel="stylesheet">	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.css" />
	<link rel="Shortcut Icon" type="image/x-icon" href="img/LOGO.png" />
</head>
<body>

	<!-- JS連結 -->
	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.3/sweetalert2.js" type="text/javascript"></script>

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
					header("location:login1.php");
					echo '<li class="nav-item"><a class="nav-link" href="index.php">LOGIN</a></li>';
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
					<p class="title text-center">SHOPPING CART</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
<?php
include 'mysql_connect.php'; //引入mysql連線方法的檔案
//主要邏輯為：利用session儲存加入購物車的資料，從而來區別每一個人使用者各自的購物車，
//而session儲存的內容是一個二維陣列，格式為array【‘商品的名字’】['商品的具體資料']
//其中商品的具體資料有兩個1、使用者選擇的商品ID 2、使用者選擇的數量
//
$count =0;
$GetUser = $_SESSION['user_name'];
$sql = "select * from member where M_Account = '".$GetUser."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$GetUser = $row[0];
$GetMoney = $row[9];
$sql = "select * from cart where MemberID = (select ID from member where M_Account='".$_SESSION['user_name']."')";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $sql = "select * from gamelist where GameID=".$row[1];
    $gameresult = mysqli_query($conn, $sql);
    $gamename = mysqli_fetch_array($gameresult);
    //echo $gamename[1].$gamename[2].$gamename[6].$row[2]."<br>";
    echo '<div class="col-2">';
    echo '<img src="'.$gamename[3].'" width="50" height="50">';
    echo '</div>';
    echo '<div class="col-8">';
    echo $gamename[1]." / ".$gamename[2]." / $".$gamename[8]." / ".$row[2]."<br>";
    echo '</div>';
    echo '<div class="col-2">';
	echo '<form method="post"><input type="submit" name="delete'.$gamename[0].'" value="Delete"/>';
	if(isset($_POST['delete'.$gamename[0]])){
		$sql = "DELETE FROM cart WHERE (MemberID=".$GetUser." AND GameID=".$gamename[0].")";
		mysqli_query($conn, $sql);
		header("location:buy1.php");
	}
	echo '</form>';
	echo '</div>';
	$count=$count+$gamename[8];
}
echo "<p style='color:red'>限時優惠!!同筆訂單滿五百打八折!!</p>";
if(intval($count)>=500){
	echo "Total: $<s>$count</s>    $".floor(intval($count)*0.8);
}
else echo "Total: $".$count;
echo '<form method="post"><input type="submit" name="deleteall" value="Delete All"/>';
if(isset($_POST['deleteall'])){
	$sql = "DELETE FROM cart WHERE MemberID=".$GetUser;
	mysqli_query($conn, $sql);
	header("location:buy1.php");
}
echo '</form>';
echo '<form method="post"><input type="submit" name="buy" value="Buy It"/>';
if(isset($_POST['buy'])){
	if($GetMoney>=floor(intval($count)*0.8)){
		$sql = "select * from cart where MemberID = (select ID from member where M_Account='".$_SESSION['user_name']."')";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result)) {
			$sql = "INSERT INTO `orderlist`(`MemberID`, `GameID`, `AddTime`,`Amount`) VALUES (".$row[0].",".$row[1].",NOW(),1)";
			mysqli_query($conn, $sql);
		}
		$sql = "DELETE FROM cart WHERE MemberID=".$GetUser;
		mysqli_query($conn, $sql);
		$GetMoney = $GetMoney-floor(intval($count)*0.8);
		$sql = "UPDATE member SET credit=".$GetMoney." WHERE ID=" . $GetUser;
		mysqli_query($conn, $sql);
		echo '<script>swal("Success", "購買成功!", "success");</script>';
	}else{
		echo '<script>swal("Oops", "點數不足!", "error" );</script>';
	}
	header("Refresh:1;buy1.php");

}
echo '</form>';
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