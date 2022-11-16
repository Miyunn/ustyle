<?php require("../database/Product.php")?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>uStyle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/layout.css">
	<link rel="stylesheet" href="../styles/home.css">
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

        <img id="shopIcon" src="../resources/user.png" alt="Cart">
	</header>
    
	<?php 
	
	$pObj = new Product();
    $product = $pObj->GetProductInfo();
	   
	foreach($pObj as $item)
	{
		$p = new Product();
		$p = $item;
		
		

		echo('<div class="collection">');
		echo('<div class="product">');
		   echo('<img src="'.$p->GetImage(0).'" class="clothes">');
		   echo('<h4>'.$p->Name.'</h4>');
		   echo('<h4>Rs.'.$p->Price.'</h4>');
			echo('<button class="btnbn" name="btnvw"><a href="productview.php">View More</a></button>');
		 echo( '<button class="btnct"  ><a href="">Add to Cart</a></button>');
		   echo('</div>');
		echo('</div>');

		
	}

			