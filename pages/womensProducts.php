<?php require("../database/product.php");?>	
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Womens</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/layout.css">
<link rel="stylesheet" href="../css/itemsPage.css">
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
			</ul>
				
		</nav>	 
		
		<img id="shopIcon" src="../images/shopIcon.png" alt="Cart">
		
	</header>
	
	<!-- /Navigation -->

	<h1>Womens</h1>

	<button onclick="listView()"><i class="fa fa-bars"></i> Change to List View</button>
	<button onclick="gridView()"><i class="fa fa-th-large"></i> Change to Grind View</button>
	<!-- row  -->
	<div class="row">
		
	<?php
		$prod = product::FillProductPage("f");
		$rowCounter = 1;
		foreach($prod as $u)
		{
			$prod = new product();
			$prod = $u;
	
			if($rowCounter >0)
			{
				echo '<div class="row">
				<div class="column">
				<a href="selectedProduct.php?val='.$prod->GetCode().'">
				<img class="GridImg" src="../'. $prod->GetImage().'"}>
				<a/>
				<h2>'.$prod->GetTitle().'</h2>
				<p>LKR'.$prod->GetPrice().'</p>
			  	</div>';
				$rowCounter--;
			}

			else
			{
				echo'
				<div class="column">
				<a href="selectedProduct.php?val='.$prod->GetCode().'">
				<img class="GridImg" src="../'. $prod->GetImage().'"}>
				<a/>
				<h2>'.$prod->GetTitle().'</h2>
				<p>LKR'.$prod->GetPrice().'</p>
			  	</div>
				</div>';

				$rowCounter++;
			}
		}
	
 	?>

	 <script>
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}	
	 </script>
	

</body>
</html>


</body>
</html>
