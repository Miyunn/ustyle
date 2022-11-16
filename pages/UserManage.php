<?php session_start();
require("../database/user.php");

if($_SESSION['admin']=="true"){}

else{
   header("location:productsList.php");
}

$editUsername = "";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manage Users</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/manageUser.css">
</head>
	
<body>
	<!-- Navigation -->
	<header>
		<img id="webLogo" src ="../resources/logo.png" alt="uStyle">

		<nav>
			<ul class="navUl">
				<li><a class="navigation" href="Home.php">News Feed</a></li>
				<li><a class="navigation" href="productsList.php">Manage Products</a></li>
				<li><a class="navigation" href="viewFeed.php">Customer Feedback</a></li>
				<li><a class="navigation" href="userManage.php">Manage Users</a></li>
			</ul>		
		</nav>	 

		<a href ="../Admin.php">
        <img id="shopIcon" src="../resources/user.png" alt="Cart">
		</a>
	</header>

	<h3>Add Users</h3>
	<div id = "AddUser">

	<form method="post" enctype="multipart/form-data">
	<ul style="list-style-type: none">
		<li>Username</li>
		<li><input type="text" name="txtUn" required></li>
		<li>Password</li>
		<li><input type="password" name="txtPass" required></li>
		<li>Confirm Password</li>
		<li><input type="password" name="txtConPass" required></li>
		<input type="checkbox" id="admin" name="admin" value="admin">
		<label for="admin">Admin Account</label>
		<li><input type="submit" name="btnAdd" value="Create Account"></li>
		<li></li>
	</ul>

</form>

	<?php
	if(isset($_POST["btnAdd"]))
	{
		$password1  =  ($_POST['txtPass']);
		$password2  =  ($_POST['txtConPass']);
		if($password1 == $password2)
		{
			$User = new user;
			$User->SetUsername($_POST["txtUn"]);
			$User->SetPassword($_POST["txtPass"]);

			if (isset($_POST['admin']))
			{
				$User->SetAccType(1);
			}

			else
			{			
				$User->SetAccType(0);
			}
		
			$User->Register();
		
			$_SESSION["User"] = serialize($User);
		}

		else
		{
			echo 'Passwords do not match';
		}
		
	}
	?>
	</div>

	<h3>User List</h3>

	<form method="post" enctype="multipart/form-data">
	<?php

	$User = user::GetUsers();
	echo '<table border = "1px solid black", border-collapse: "collapse";>';
	echo '<tr>';
	echo '<th> Username </th><th> Account Type </th><th> Action </th>';
	echo '</tr>';

	$userName;

	foreach($User as $u)
	{
		$User = new user();
		$User = $u;

		$userName = $User->GetUsername();

		echo '<tr>';
		echo '<td>'.$userName.'</td>';
		echo '<td>'.$User->GetAccType().'</td>';
		echo '<td> <button name="btnEdit" value="'.$userName.'" type="submit"> Edit</buton>';
		echo '<button name="btnDelete" value="'.$userName.'" type="submit"> Delete</buton></td>';
		echo '</tr>';
	}

	echo '</table>';
	?>

	<?php

	//Delete User
	if(isset($_POST["btnDelete"]))
	{
		$UserDel = new user;
		$UserDel->SetUsername($_POST["btnDelete"]);
		$UserDel->DeleteUser();
		header("Refresh:0");
	}

	//Update User
	if(isset($_POST["btnEdit"]))
	{
		$editUsername = ($_POST["btnEdit"]);
	



echo '</form>';

	
echo '<h3>Chaning Password for User :';
echo $editUsername; 
echo'</h3>';

echo'	
    <div id = "AddUser">

	<form method="post" enctype="multipart/form-data">
	<ul style="list-style-type: none">
		<li>Password</li>
		<li><input type="password" name="txtUpdatePass" required></li>
		<li>Confirm Password</li>
		<li><input type="password" name="txtConUpdatePass" required></li>
		<li><input type="submit" name="btnChange" value="Change Password"></li>
		<li></li>
	</ul>
    </form>';

	//Update Pass
	if(isset($_POST["btnChange"]))
	{
		$password1  =  ($_POST['txtUpdatePass']);
		$password2  =  ($_POST['txtConUpdatePass']);
		
		if($password1 == $password2)
		{
			$UserEdit = new user;
			$UserEdit->SetUsername($editUsername);
			$UserEdit->SetPassword($password2);
			$UserEdit->UpdatePass();
		}
	}
}
	?>
	

</body>
</html>