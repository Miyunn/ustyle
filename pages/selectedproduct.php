<?php require("../database/product.php");
$val = $_GET["val"];
?>	

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Casual Romance Blush Blouse</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/layout.css">
<link rel="stylesheet" href="../css/item.css">
</head>
<body>

	<!-- Navigation -->
	<header>
		<img id="webLogo" src ="../images/logo.png" alt="uStyle">
		<nav>
			<ul class="navUl">
				<li><a class="navigation" href="../index.php">Home</a></li>
				<li><a class="navigation" href="products.html">Products</a></li>
				<li><a class="navigation" href="about.php">About</a></li>
				<li><a class="navigation" href="contact.php">Contact</a></li>
			</ul>
		</nav>
		<div id="cart">
			<img id="shopIcon" src="../images/shopIcon.png" alt="Cart">
		</div>
		
	</header>

	<div id="content">
		
		<?php
		$prod = new Product();
		$prod->SetCode($val);
		$prodInfo = $prod->GetProductInfo();
		echo '<img id="itemImage" src= "../'; echo $prod->Image; echo'">';
		
		echo '<div id="textContent">
			<h2>'; echo $prod->Title;'</h2><br>';
			echo '<p> Product Code : '; echo $prod->Code; echo'</p> <br>';

			echo '<p id="price"> LKR. '; echo $prod->Price; echo'</p> <br>';
			$stockCon = $prod->Stock;

			if($stockCon== 1)
			{
				echo'<p id="stock"> Available to purchase </p> </br>';
			}

			else
			{
				echo'<p id="stock"> Out of Stock </p> </br>';
			}
			
			echo'<label for="sizes">Select your size:</label>

			<select name="sizes" id="sizes">';

			if($prod->Small == 1)
			{
				echo '  <option value="small">Small</option>';
			}
			
			if($prod->Medium == 1)
			{
				echo '<option value="medium">Medium</option>';
			}

			if($prod->Large == 1)
			{
				echo '<option value="large">Marge</option>';
			}

			echo'
			</select>
			<br>
			<button id="addCart" type="button">Add to Cart</button>
			<form action="../womensProducts.html">
				<input type="submit" value="Browse More" id="BrowseBtn">
			</form>
			
		</div>
	</div>
	
    <div id="description">
	<h3>Description</h3>
		<p>';echo $prod->Description; echo'<br>Colour:'; echo $prod->Color; echo'</p>
    </div>
		'?>
		<!-- Footer -->
	<footer>

			<div class="footerNav">

				<p class="footerLinks">
					<a class="link-1" href="../../index.html">Home</a>
					|
					<a class="link-1" href="../sitemap.html">Sitemap</a>
				</p>

				<p>uStyles&copy; 2020 | Designed by Kavinthe Perera</p>
			</div>

	</footer>
	<!-- /Footer -->
	
	<script src="../../scripts/cartBtn.js"></script>


</body>
</html>
