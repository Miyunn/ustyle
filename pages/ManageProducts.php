<?php 
session_start(); 
require("../database/product.php");
if($_SESSION['login']=="true"){}

 else{
	header("location:../Admin.php");
 }

$val = $_GET["val"];
?>	
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manage Products</title>
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

		<a href ="../Admin.php">
        <img id="shopIcon" src="../resources/user.png" alt="Cart">
		</a>
	</header>

	<h2>Manage Product Information</h2>

		
		<form method="post" enctype="multipart/form-data" id="news">
		<ul style="list-style-type: none">


		<?php
		$prod = new Product();
		$prod->SetCode($val);
		$prodInfo = $prod->GetProductInfo();
		$proID = $prod->Code;

		echo '<li>Product Code : '; echo $prod->Code; echo'</li>';
		echo '<li> Product Name : '; echo $prod->Title; echo'</li>';
		echo '<li> Category: '; echo $prod->Category; echo'</li>';
		echo '<li> Description : '; echo $prod->Description; echo'</li>';
		echo '<li> Colour : '; echo $prod->Color; echo'</li>';
		echo '<li> Price in LKR : ';
		echo '<input type="text" name="txtPrice" value="';
		echo $prod->Price; echo'" required"></li>';
		echo '<li> Sizes </li>';
		echo '<input type="checkbox" id="size" name="sizeL" value="sizeL"'; if($prod->Large == 1){echo"checked";} echo'>';
		echo '<label for="sizeL">Large</label>';
        echo '<input type="checkbox" id="size" name="sizeM" value="sizeM"'; if($prod->Medium == 1){echo"checked";} echo'>';
		echo '<label for="sizeM">Medium</label>';
		echo '<input type="checkbox" id="size" name="sizeS" value="sizeS"'; if($prod->Small == 1){echo"checked";} echo'>';
		echo '<label for="sizeS">Small</label>';
		echo '<li><input type="checkbox" id="stock" name="stock" value="stock"'; if($prod->Stock == 1){echo"checked";} echo'>';
		echo '<label for="stock">Available</label></li>';
		echo '<li><input type="submit" name="btnUpdateNews" value="Update"></li>';
		echo '</ul>';

		?>
		
		</ul>
		</form>
		<?php
		if(isset($_POST["btnUpdateNews"]))
		{
			$newcontent = new Product();
			$_news = ($_POST['txtPrice']);

			$_sSize; 
			$_mSize;
			$_lSize;
			$_avil;

			if (isset($_POST['sizeS'])) { $_sSize = 1 ;}
			else {$_sSize = 0 ;}
			
			if (isset($_POST['sizeL'])) { $_lSize = 1 ;}
			else { $_lSize = 0 ;}
	
			if (isset($_POST['sizeM'])) { $_mSize = 1 ;}
			else { $_mSize = 0 ;}

			if (isset($_POST['stock'])) { $_avil = 1 ;}
			else { $_avil = 0 ;}
			
			
			$newcontent->updateInfo($proID, $_news, $_sSize, $_mSize, $_lSize, $_avil);

			header("Refresh:0");
		}

		
	echo'
	<form method="post" enctype="multipart/form-data">
		<ul style="list-style-type: none">
		<li>Upload new image</li>
		<li><input type="file" name="img"></li>
		<li><input type="submit" name="btnImg2" value="Update"></li>
		<button name="btnDelete" value="'.$proID.'" type="submit"> Delete</buton></td>
	</ul>
	</form>';
	
	
	if(isset($_POST["btnImg2"]))
	{
		$newcontent = new Product();
		$images="";
		$pic =	$_FILES['img']['name'];
					
		 $pic =	$_FILES['img']['name'];
					
			$info = new SplFileInfo($pic);
			$newName= "$proID".'.'.$info->getExtension();
			if(move_uploaded_file($_FILES["img"]["tmp_name"], 
			'../database/images/'.$newName))
			{
				$images='database/images/'.$newName;
			}

			$newcontent->updateImg($images, $proID);
	}	
 
	if(isset($_POST["btnDelete"]))
	{
		$newcontent = new Product();
		$newcontent->DeleteProduct($proID);
		header("location:ProductsList.php");
	}
	?>

</body>
</html>