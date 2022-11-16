<?php 
session_start(); 
require("../database/content.php");
if($_SESSION['login']=="true"){}

else{
   header("location:../Admin.php");
}
?>
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

		<a href ="../Admin.php">
        <img id="shopIcon" src="../resources/user.png" alt="Cart">
		</a>
	</header>

	<h2>Home Page Content</h2>
	<form method="post" enctype="multipart/form-data">
	<ul style="list-style-type: none">
		<li>Banner Image</li>
		<li><input type="file" name="txtPic"></li>
		<li><input type="submit" name="btnReg" value="Update"></li>
	</ul>
	</form>
	<?php 
	if(isset($_POST["btnReg"]))
	{
		$newcontent = new Content();
		$images="";
		$pic =	$_FILES['txtPic']['name'];
					
			$info = new SplFileInfo($pic);
			$newName= "banner".'.'.$info->getExtension();
			if(move_uploaded_file($_FILES["txtPic"]["tmp_name"], 
			'../database/images/'.$newName))
			{
				$images='database/images/'.$newName;

			}

		$newcontent->updateImg($images,0);
	}
	?>
		
		<form method="post" enctype="multipart/form-data" id="news">
		<ul style="list-style-type: none">
		<li>News Heading</li>
		<?php
		echo '<li><input type="text" name="txtHeading" value="'; $content = new Content();
		$content->SetContentID('1');
		$newsHeading = $content->GetContent(); echo $content->Value; echo'" required"></li>
		<li>News Content</li>';
		echo '<li><input type="text" name="txtContent" value="';
		$content->SetContentID('2');
		$newsHeading = $content->GetContent(); echo $content->Value; echo'" required"></li>';
		echo '<li><input type="submit" name="btnUpdateNews" value="Update"></li>';
		echo '</ul>';
		?>
		
		</ul>
		</form>
		<?php
		if(isset($_POST["btnUpdateNews"]))
		{
			$newcontent = new Content();
			$_news = ($_POST['txtHeading']);
			$newcontent->updateNews($_news,1);

			$newcontent = new Content();
			$_news = ($_POST['txtContent']);
			$newcontent->updateNews($_news,2);

			header("Refresh:0");

		}
		?>

		<h2> Trending This Week </h2>

	<form method="post" enctype="multipart/form-data">
		<ul style="list-style-type: none">
		<li>Trending Image 1</li>
		<li><input type="file" name="txtPic"></li>
		<li><input type="submit" name="btnImg1" value="Update"></li>
	</ul>
	</form>
	<?php 
	if(isset($_POST["btnImg1"]))
	{
		$newcontent = new Content();
		$images="";
		$pic =	$_FILES['txtPic']['name'];
					
			$info = new SplFileInfo($pic);
			$newName= "trend1".'.'.$info->getExtension();
			if(move_uploaded_file($_FILES["txtPic"]["tmp_name"], 
			'../database/images/'.$newName))
			{
				$images='database/images/'.$newName;
			}

			$newcontent->updateImg($images,3);
	}
	?>

<form method="post" enctype="multipart/form-data">
		<ul style="list-style-type: none">
		<li>Trending Image 2</li>
		<li><input type="file" name="txtPic"></li>
		<li><input type="submit" name="btnImg2" value="Update"></li>
	</ul>
	</form>
	<?php 
	if(isset($_POST["btnImg2"]))
	{
		$newcontent = new Content();
		$images="";
		$pic =	$_FILES['txtPic']['name'];
					
			$info = new SplFileInfo($pic);
			$newName= "trend2".'.'.$info->getExtension();
			if(move_uploaded_file($_FILES["txtPic"]["tmp_name"], 
			'../database/images/'.$newName))
			{
				$images='database/images/'.$newName;
			}

			$newcontent->updateImg($images,4);
	}
	?>

<form method="post" enctype="multipart/form-data">
		<ul style="list-style-type: none">
		<li>Trending Image 3</li>
		<li><input type="file" name="txtPic"></li>
		<li><input type="submit" name="btnImg3" value="Update"></li>
	</ul>
	</form>
	<?php 
	if(isset($_POST["btnImg3"]))
	{
		$newcontent = new Content();
		$images="";
		$pic =	$_FILES['txtPic']['name'];
					
			$info = new SplFileInfo($pic);
			$newName= "trend3".'.'.$info->getExtension();
			if(move_uploaded_file($_FILES["txtPic"]["tmp_name"], 
			'../database/images/'.$newName))
			{
				$images='database/images/'.$newName;
			}

			$newcontent->updateImg($images,5);
	}
	?>

<h2> New Item </h2>

<form method="post" enctype="multipart/form-data">
	<ul style="list-style-type: none">
	<li>New Item Image 1</li>
	<li><input type="file" name="txtPic"></li>
	<li><input type="submit" name="btnImg4" value="Update"></li>
</ul>
</form>
<?php 
if(isset($_POST["btnImg4"]))
{
	$newcontent = new Content();
	$images="";
	$pic =	$_FILES['txtPic']['name'];
				
		$info = new SplFileInfo($pic);
		$newName= "new1".'.'.$info->getExtension();
		if(move_uploaded_file($_FILES["txtPic"]["tmp_name"], 
		'../database/images/'.$newName))
		{
			$images='database/images/'.$newName;
		}

		$newcontent->updateImg($images,6);
}
?>

<form method="post" enctype="multipart/form-data">
	<ul style="list-style-type: none">
	<li>New Item Image 2</li>
	<li><input type="file" name="txtPic"></li>
	<li><input type="submit" name="btnImg5" value="Update"></li>
</ul>
</form>
<?php 
if(isset($_POST["btnImg5"]))
{
	$newcontent = new Content();
	$images="";
	$pic =	$_FILES['txtPic']['name'];
				
		$info = new SplFileInfo($pic);
		$newName= "new2".'.'.$info->getExtension();
		if(move_uploaded_file($_FILES["txtPic"]["tmp_name"], 
		'../database/images/'.$newName))
		{
			$images='database/images/'.$newName;
		}

		$newcontent->updateImg($images,7);
}
?>

<form method="post" enctype="multipart/form-data">
<ul style="list-style-type: none">
	<li>New Item Image 3</li>
	<li><input type="file" name="txtPic"></li>
	<li><input type="submit" name="btnImg6" value="Update"></li>
</ul>
</form>
<?php 
if(isset($_POST["btnImg6"]))
{
	$newcontent = new Content();
	$images="";
	$pic =	$_FILES['txtPic']['name'];
				
		$info = new SplFileInfo($pic);
		$newName= "new3".'.'.$info->getExtension();
		if(move_uploaded_file($_FILES["txtPic"]["tmp_name"], 
		'../database/images/'.$newName))
		{
			$images='database/images/'.$newName;
		}

		$newcontent->updateImg($images,8);
}
?>

</body>
</html>