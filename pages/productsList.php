<?php
session_start(); 
require("../database/product.php");

 if($_SESSION['login']=="true"){}

 else{
	header("location:../Admin.php");
 }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>All Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/productList.css">
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

	<a href="addProduct.php">
		<button name="btnEdit" value="" type="submit"> Add New Products</button> </a>
	<center>

	
	<h2>All Products</h2>


	<?php

	$Pro = product::GetProList();
	echo '<table border = "1px solid black", border-collapse: "collapse";>';
	echo '<tr>';
	echo '<th> Image </th><th> Code </th><th> Category </th><th> Name </th><th> Description </th><th> Price </th><th> Colour </th><th> Availability </th><th> Small </th><th> Medium </th><th> Large </th> <th> Action </th>';
	echo '</tr>';

	foreach($Pro as $u)
	{
		$pro = new product();
		$pro = $u;

		$Refcode = $pro->GetCode();

		echo '<tr>';
		echo '<td> <img class="GridImg" src= "../'.$pro->GetImage().'"</td>';
		echo '<td>'.$pro->GetCode().'</td>';
		echo '<td>'.$pro->GetCategory().'</td>';		
		echo '<td>'.$pro->GetTitle().'</td>';
		echo '<td>'.$pro->GetDescription().'</td>';
		echo '<td>'.$pro->GetPrice().'</td>';
		echo '<td>'.$pro->GetColor().'</td>';
		echo '<td>'.$pro->GetStock().'</td>';
		echo '<td>'.$pro->GetSmall().'</td>';
		echo '<td>'.$pro->GetMedium().'</td>';
		echo '<td>'.$pro->GetLarge().'</td>';
		echo '<td> <a href="ManageProducts.php?val='.$Refcode.'">
		<button name="btnEdit" value="'.$Refcode.'" type="submit"> Edit</buton> </a>';
		echo '</tr>';
	}
	?>

	</div>

	<center>
</body>
</html>