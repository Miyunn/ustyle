<?php
class Connection
{
	public static function GetConnection()
	{
	$serverName ="localhost";
	$dbName		="uStylesDB";
 	$user		="root";
 	$password 	="password";
	$conn =new PDO("mysql:host=$serverName;dbname=$dbName",$user,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return($conn);
	}
}
?>


