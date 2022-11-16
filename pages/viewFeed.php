<?php session_start();
require("../database/feedbackClass.php");
if($_SESSION['login']=="true"){}

else{
   header("location:../Admin.php");
}

$editUsername = "";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Customer Feedback</title>
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

	<h3>User Feedback</h3>

    <form method="post" enctype="multipart/form-data">
	
	<?php 
	$contt = feed::GetAllFeedback();
	echo '<table border = "1px solid black", border-collapse: "collapse";>';
	echo '<tr>';
	echo '<th> Feedback ID </th><th> First Name </th><th> Last Name </th><th> Email</th><th> Contact</th><th>FeedBack</th><th></th>';
	echo '</tr>';


	foreach($contt as $c)
	{
	    $cont = new feed;
        $cont = $c;
	
		echo '<tr>';
		echo '<td>'.$cont->getFeedID().'</td>';
		echo '<td>'.$cont->getFirstName().'</td>';
        echo '<td>'.$cont->getLastName().'</td>';
        echo '<td>'.$cont->getEmail().'</td>';
        echo '<td>'.$cont->getContact().'</td>';
        echo '<td>'.$cont->getFeedback().'</td>';
		echo '<td><button name="btnDelete" value="'.$cont->getFeedID().'" type="submit"> Delete</buton></td>';
		echo '</tr>';
	}

	echo '</table>';

	if(isset($_POST["btnDelete"]))
	{
		$UserDel = new feed;
		$UserDel->SetFeedID($_POST["btnDelete"]);
		$UserDel->DeleteFeedback();
		header("Refresh:0");
	}

	?>

</body>
</html>