<?php require("../admin/database/content.php");?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>uStyle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/home.css">

</head>
	
<body>
	
		<!-- Navigation -->
	<header>
		
		<img id="webLogo" src ="images/logo.png" alt="uStyle">
		
		<nav>
			
			<ul class="navUl">
				<li><a class="activeNavigation" href="index.php">Home</a></li>
				<li><a class="navigation" href="pages/products.html">Products</a></li>
				<li><a class="navigation" href="pages/about.html">About</a></li>
				<li><a class="navigation" href="pages/contact.php">Contact</a></li>
			</ul>
				
		</nav>	 
		
		<img id="shopIcon" src="images/shopIcon.png" alt="Cart">
		
	</header>
	
	<!-- /Navigation -->
	
	<!-- Welcome Message -->
	<?php
	$banner = new Content();
	$banner->setContentID('0');
	$bannerDis = $banner->GetContent();
	echo '<img class="welcomeImage" src= "'; echo $banner->Value; echo'" alt="Welcome to uStyle.com">';

	echo '<div id="updates">
		<h2>';
				$content = new Content();
				$content->SetContentID('1');
				$newsHeading = $content->GetContent();
				echo $content->Value;
			
		echo '</h2>
		<p>';
				$conten = new Content();
				$conten->SetContentID('2');
				$news = $conten->GetContent();
				echo $conten->Value;
			
	echo	'</p>
	</div>
	
	<!--Items -->
	<div id="best_sellers">
		<h2>Trending This Week</h2>
		
			<a href="" >
				<img class="newItem1" src="'; $content = new Content();
				$content->SetContentID('3');
				$newsHeading = $content->GetContent();
				echo $content->Value; echo'"alt="Trending Image 1">
			</a>
			
			<a href="" >
				<img class="newItem2" src="'; $content = new Content();
				$content->SetContentID('4');
				$newsHeading = $content->GetContent();
				echo $content->Value; echo'"alt="Trending Image 2">
			</a>
		
			<a href="">
    			<img class="newItem3" src="'; $content = new Content();
				$content->SetContentID('5');
				$newsHeading = $content->GetContent();
				echo $content->Value; echo'"alt="Trending Image 3">
				
			</a>
			
		<div id="newArival">
			
		<a href="" >
				<img class="newItem1" src="'; $content = new Content();
				$content->SetContentID('6');
				$newsHeading = $content->GetContent();
				echo $content->Value; echo'"alt="New Image 1">
			</a>
			
			<a href="" >
				<img class="newItem2" src="'; $content = new Content();
				$content->SetContentID('7');
				$newsHeading = $content->GetContent();
				echo $content->Value; echo'"alt="New Image 2">
			</a>
		
			<a href="">
    			<img class="newItem3" src="'; $content = new Content();
				$content->SetContentID('8');
				$newsHeading = $content->GetContent();
				echo $content->Value; echo'"alt="New Image 3">';
			?>
		</div>
			
	</div>
	
		<!-- Footer -->
	<footer>

			<div class="footerNav">

				<p class="footerLinks">
					<a class="link-1" href="index.html">Home</a>
					|
					<a class="link-1" href="pages/sitemap.html">Sitemap</a>
				</p>

				<p>uStyles&copy; 2020 | Designed by Kavinthe Perera</p>
			</div>

	</footer>
	<!-- /Footer -->
	
</body>
</html>
