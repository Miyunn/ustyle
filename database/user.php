<?php
require("connection.php");
class User
{
	public $Username;
	private $Password;
	public $AccType;
	
	public function SetUsername($_userName)
	{
		$this->Username = $_userName;
	}
	public function GetUsername()
	{
		return($this->Username);
	}

	public function SetPassword($_password)
	{
		$this->Password = $_password;
	}
	public function GetPassword()
	{
		return($this->Password);
	}

	public function SetAccType($_accType)
	{
		$this->AccType = $_accType;
	}
	public function GetAccType()
	{
		return($this->AccType);
	}
	
	public function Register()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="INSERT INTO `users`( `Username`, `Password`, `Account`) VALUES (?,?,?)";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->Username,PDO::PARAM_STR);
			$statment->bindParam(2,$this->Password,PDO::PARAM_STR);
			$statment->bindParam(3,$this->AccType,PDO::PARAM_STR);
			$statment->execute();
		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}

	}
	
	public function Login()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `Username`,`Password`,`Account` FROM `users` WHERE `Username`=? and `Password`=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->Username,PDO::PARAM_STR);
			$statment->bindParam(2,$this->Password,PDO::PARAM_STR);
			$statment->execute();
			$result = $statment->fetchall();
			
			if(sizeof($result)>0)
			{
				$this->Username = $result[0]["Username"];
				$this->Password = $result[0]["Password"];
				$this->AccType = $result[0]["Account"];
				
				if($this->AccType == 1){
					return(2);
				}
				else{
					return(1);
				}
				
			}

			else
				return(0);
		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		
		}
	}
	
	public function UpdatePass()
	{
		try
		{
			echo $this->Username;
			echo $this->Password;
			$conn = Connection::GetConnection();
			$query ="UPDATE `users` SET `Password`= ? Where `Username`=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->Password,PDO::PARAM_STR);
			$statment->bindParam(2,$this->Username,PDO::PARAM_STR);

			$statment->execute();
		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}
	
	public static function GetUsers()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `Username`, `Password`, `Account` FROM `users` ";
			$statment= $conn->prepare($query);
			$statment->execute();
			$result = $statment->fetchall();
			$users = array();
			foreach($result as $item)
			{
				$newUser = new User();
				$newUser->Username = $item["Username"];
				$newUser->Password = $item["Password"];
                $newUser->AccType = $item["Account"]; 
				array_push($users,$newUser);
			}

			return $users;
			
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		
		}
	}
	
	public function DeleteUser()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="DELETE FROM `users` WHERE Username=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->Username,PDO::PARAM_STR);
			echo $this->Username;
			$statment->execute();
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}
}
?>	