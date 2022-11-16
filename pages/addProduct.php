<?php require("../database/product.php");?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add New Product</title>
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

	<h2>New Product Form</h2>

	<div id = "AddUser">

	<form method="post" enctype="multipart/form-data">
	<ul style="list-style-type: none">
		<li>Code</li>
		<li><input type="text" name="txtUn" required></li>

		<li>Product Name</li>
		<li><input type="text" name="txtTitle" required></li>

		<label for="cat">Choose a category</label>
        <select name="cat" id="cat">
        <option value="m">Gents</option>
        <option value="f">Ladies</option>
        </select>

        <li>Description</li>
		<li><input type="text" name="txtDescription" required></li>

        <li>Price</li>
		<li><input type="text" name="txtPrice" required></li>

        <li>Color</li>
		<li><input type="text" name="txtColor" required></li>

		<input type="checkbox" id="stock" name="stock" value="stock" checked>
		<label for="stock">Stock Availability</label> 

        <li>Sizes</li>
        <input type="checkbox" id="size" name="sizeL" value="sizeL">
		<label for="sizeL">Large</label>
        <input type="checkbox" id="size" name="sizeM" value="sizeM">
		<label for="sizeM">Medium</label>
        <input type="checkbox" id="size" name="sizeS" value="sizeS">
		<label for="sizeS">Small</label>

        <li>Product Image</li>
		<li><input type="file" name="img"></li><br>

		<li><input type="submit" name="btnAdd" value="Add Product"></li>
		<li></li>
	</ul>

</form>

	<?php
	if(isset($_POST["btnAdd"]))
	{
        $procode = ($_POST["txtUn"]);
		$prod = new product;
		$prod->SetCode($_POST["txtUn"]);
        $prod->SetTitile($_POST["txtTitle"]);
        $prod->SetDescription($_POST["txtDescription"]);
        $prod->SetPrice($_POST["txtPrice"]);
        $prod->SetColor($_POST["txtColor"]);
        $prod->SetCategory($_POST["cat"]);

		if (isset($_POST['stock'])) { $prod->SetStock(1);}
		else {$prod->SetStock(0);}
		
        if (isset($_POST['sizeL'])) {$prod->SetLarge(1);}
		else {$prod->SetLarge(0);}

        if (isset($_POST['sizeM'])) {$prod->SetMedium(1);}
		else{$prod->SetMedium(0);}

        if (isset($_POST['sizeS'])) {$prod->SetSmall(1);}
        else{$prod->SetSmall(0);}

		$pic =	$_FILES['img']['name'];
					
		$info = new SplFileInfo($pic);
		$newName= "$procode".'.'.$info->getExtension();
		if(move_uploaded_file($_FILES["img"]["tmp_name"], 
		'../database/images/'.$newName))
		{
			$images='database/images/'.$newName;
		}

		$prod->SetImage($images);

		$prod->Add();

		echo "New Item Added";
		
	}
		
	?>
	</div>
</body>
</html>