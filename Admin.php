<?php session_start();
require("database/user.php");
$_SESSION['login'] = "false";
$_SESSION['admin'] = "false";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>U Styles - Admin Login</title>
	<link rel="stylesheet" href="styles/layout.css">
	<link rel="stylesheet" href="styles/login.css">
</head>

<body>
<header>
		<img id="webLogo" src ="images/logo.png" alt="uStyle">

		<nav>
			<ul class="navUl">
				<li><a class="navigation" href="">Admin Page</a></li>
			</ul>		
		</nav>	 

        <img id="shopIcon" src="" alt="">

	</header>

	<h2> Please Login to access</h2>
	
	<div id="login">
	<form method="post"> 
	<ul style="list-style-type: none">
		<li>Enter Username</li>
		<li><input type="text" name="txtUn" required></li>
		<li>Enter Password</li>
		<li><input type="password" name="txtPw" required></li>
		<li><input type="submit" name="btnLog" value="Login"></li>		
	</ul>	
	</form>
	</div>
	<?php 
		if(isset($_POST["btnLog"]))
		{
			$user = new User();
			$user->SetUsername($_POST["txtUn"]);
			$user->SetPassword($_POST["txtPw"]);
			
			if($user->Login() == 1)
			{
				$_SESSION['login'] = "true";
				header("location:pages/ProductsList.php");
			}
			else
			{
				if($user->Login() == 2)
				{
					$_SESSION['login'] = "true";
					$_SESSION['admin'] = "true";
					header("location:pages/ProductsList.php");
				}
				else
				{
					echo "Incorrect username or password";
				}
				
			}
		}
	?>
</body>
</html>
