<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<!-- 手機版縮放 -->
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>啪奏遊戲網 Puzzle Game | 信件回復</title>
	<!-- css連結 -->
	<link href="css/tylee.css" rel="stylesheet">	
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
                <p class="title text-center">ACCOUNT</p>
					<hr class="title_line">
				</div>
			</div>
			<div class="row">
			<div class="col-12">
        <form id="form1" name="form1" method="post" action="insert1.php">
            會員ID:<input type="text"  size="10" name="ID" id="textfield" />
            名:<input type="text" size="10" name="Fname" id="textfield" />
            姓:<input type="text" size="10" name="Lname" id="textfield" />
            帳號:<input type="text" size="10" name="M_Account" id="textfield" />
            密碼:<input type="text" size="10" name="M_password" id="textfield" />
            電郵:<input type="email" size="20" name="email" id="textfield" />
            電話號碼:<input type="text" size="10" name="PhoneNumber" id="textfield" />
            性別:<input list="Sex" name="Sex" id="textfield" />
                    <datalist id="Sex">
                        <option value="Male">
                        <option value="Female">
                    </datalist>
            生日:<input type="date" size="10" name="Birthday" id="textfield" />
            點數:<input type="text" size="10" name="Credit" id="textfield" value="1000" />
            等級:<input type="text" size="10" name="Class" id="textfield" />
            <input type="submit" name="button" id="button" value="新增" />
        </form>
        <!-- 資料表格 -->
        <table border=1 width=800 cellpadding=5>
            <tr>
                <td style="font-size: 120%;color: blue;text-align: center">會員ID</td>
                <td style="font-size: 120%;color: blue;text-align: center">名</td>
                <td style="font-size: 120%;color: blue;text-align: center">姓</td>
                <td style="font-size: 120%;color: blue;text-align: center">帳號</td>
                <td style="font-size: 120%;color: blue;text-align: center">密碼</td>
                <td style="font-size: 120%;color: blue;text-align: center">電郵</td>
                <td style="font-size: 120%;color: blue;text-align: center">電話號碼</td>
                <td style="font-size: 120%;color: blue;text-align: center">性別</td>
                <td style="font-size: 120%;color: blue;text-align: center">生日</td>
                <td style="font-size: 120%;color: blue;text-align: center">點數</td>
                <td style="font-size: 120%;color: blue;text-align: center">等級</td>
            </tr>
            <!--提取資料 -->
            
            <?php
                $sql="select * from member";
                $stmt = $conn->query($sql)
            ?>
            <?php
                for($i = 1; $i <= mysqli_num_rows($stmt);$i++){
                $result = mysqli_fetch_array($stmt)
            ?>
            <tr>
                <td><?php echo $result[0] ?></td> 
                <td><?php echo $result[1] ?></td> 
                <td><?php echo $result[2] ?></td> 
                <td><?php echo $result[3] ?></td> 
                <td><?php echo $result[4] ?></td> 
                <td><?php echo $result[5] ?></td> 
                <td><?php echo $result[6] ?></td> 
                <td><?php echo $result[7] ?></td> 
                <td><?php echo $result[8] ?></td> 
                <td><?php echo $result[9] ?></td> 
                <td><?php echo $result[10] ?></td> 
                <td><a href="update1.php?id=<?php echo $result[0]; ?>">修改</a></td> 
                <td><a href="delete1.php?id=<?php echo $result[0]; ?>">刪除</a></td>
            </tr>
            <?php
            }
            ?>
            </table>
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

