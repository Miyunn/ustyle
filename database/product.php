<?php 
require("connection.php");
class Product
{
	public $Code;
	public $Title;
    public $Category;
	public $Description;
    public $Price;
	public $Image;
    public $Color;
    public $Stock;
    public $Small;
    public $Medium;
    public $Large;
	
	public function SetCode($_ID)
	{
		$this->Code = $_ID;
	}
	public function GetCode()
	{
		return($this->Code);
	}
	
    public function SetTitile($_Title)
	{
		$this->Title = $_Title;
	}

	public function GetTitle()
	{
		return($this->Title);
	}

    public function SetCategory($_Category)
	{
		$this->Category = $_Category;
	}

	public function GetCategory()
	{
		return($this->Category);
	}

    public function SetDescription($_Description)
	{
		$this->Description = $_Description;
	}

	public function GetDescription()
	{
		return($this->Description);
	}
	
	public function SetPrice($_Price)
	{
		$this->Price = $_Price;
	}

	public function GetPrice()
	{
		return($this->Price);
	}
	
	public function SetImage($_Image)
	{
		$this->Image = $_Image;
	}

	public function GetImage()
	{
		return($this->Image);
	}

    public function SetColor($_Color)
	{
		$this->Color = $_Color;
	}

	public function GetColor()
	{
		return($this->Color);
	}

    public function SetStock($_Stock)
	{
		$this->Stock = $_Stock;
	}

	public function GetStock()
	{
		return($this->Stock);
	}

    public function SetSmall($_Small)
	{
		$this->Small = $_Small;
	}

	public function GetSmall()
	{
		return($this->Small);
	}

    public function SetMedium($_Medium)
	{
		$this->Medium = $_Medium;
	}

	public function GetMedium()
	{
		return($this->Medium);
	}

    public function SetLarge($_Large)
	{
		$this->Large = $_Large;
	}

	public function GetLarge()
	{
		return($this->Large);
	}

	
	public function Add()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query="INSERT INTO `Product`(`productCode`, `category`, `proTitle`,  `price`, `Image`, `description`, `color`, `stock`, `small`, `medium`,`large` ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$statment=$conn->prepare($query);
			$statment->bindvalue(1, $this->Code,PDO::PARAM_INT);
			$statment->bindvalue(2, $this->Category,PDO::PARAM_STR);
			$statment->bindvalue(3, $this->Title,PDO::PARAM_STR);
			$statment->bindvalue(4, $this->Price,PDO::PARAM_STR);
			$statment->bindvalue(5, $this->Image,PDO::PARAM_STR);
			$statment->bindvalue(6, $this->Description,PDO::PARAM_STR);
			$statment->bindvalue(7, $this->Color,PDO::PARAM_STR);
			$statment->bindvalue(8, $this->Stock,PDO::PARAM_STR);
			$statment->bindvalue(9, $this->Small,PDO::PARAM_STR);
			$statment->bindvalue(10, $this->Medium,PDO::PARAM_STR);
			$statment->bindvalue(11, $this->Large,PDO::PARAM_STR);
			$statment->execute();
		}

		catch(Exception $ex)
		{
			echo $ex->getMessage();
		}
	}
	

	public  function GetProList()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `productCode`, `category`, `proTitle`,  `price`, `Image`, `description`, `color`, `stock`, `small`, `medium`,`large`  FROM `Product` ";
			$statment= $conn->prepare($query);
			$statment->execute();
			$result = $statment->fetchall();
			$users = array();
			foreach($result as $item)
			{
				$newUser = new Product();
				$newUser->Code = $item["productCode"];
				$newUser->Category = $item["category"];
                $newUser->Title = $item["proTitle"]; 
				$newUser->Price = $item["price"];
				$newUser->Image = $item["Image"];
                $newUser->Description = $item["description"]; 
				$newUser->Color = $item["color"];
				$newUser->Stock = $item["stock"];
                $newUser->Small = $item["small"]; 
				$newUser->Medium = $item["medium"];
				$newUser->Large = $item["large"];
				array_push($users,$newUser);
			}
			return $users;
		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}

	public  function GetProductInfo()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `productCode`, `category`, `proTitle`,  `price`, `Image`, `description`, `color`, `stock`, `small`, `medium`,`large` FROM `Product` where `productCode` = ?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->Code,PDO::PARAM_STR);
			$statment->execute();
			$result = $statment->fetchall();
				
			$this->Code = $result[0]["productCode"];
            $this->Category = $result[0]["category"]; 
			$this->Title = $result[0]["proTitle"];
			$this->Price = $result[0]["price"];
			$this->Image = $result[0]["Image"]; 
			$this->Description = $result[0]["description"];
			$this->Color = $result[0]["color"];
			$this->Stock = $result[0]["stock"]; 
			$this->Small = $result[0]["small"];
			$this->Medium = $result[0]["medium"];
			$this->Large = $result[0]["large"];
			
		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}

	public  function FillProductPage($_catName)
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `productCode`, `proTitle`, `price`, `Image` FROM `Product` where `category` = ?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$_catName,PDO::PARAM_STR);
			$statment->execute();
			$result = $statment->fetchall();
			$users = array();
			foreach($result as $item)
			{
				$newUser = new Product();
				$newUser->Code = $item["productCode"];
                $newUser->Title = $item["proTitle"]; 
				$newUser->Price = $item["price"];
				$newUser->Image = $item["Image"];
				array_push($users,$newUser);
			}
			return $users;
		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}

	public function updateInfo($proID, $_news, $_sSize, $_mSize, $_lSize, $_avil)
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="UPDATE `Product` SET `price`=?, `small`=?, `medium`=?, `large`=?, `stock`=? Where `productCode`=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$_news,PDO::PARAM_STR);
			$statment->bindParam(2,$_sSize,PDO::PARAM_STR);
			$statment->bindParam(3,$_mSize,PDO::PARAM_STR);
			$statment->bindParam(4,$_lSize,PDO::PARAM_STR);
			$statment->bindParam(5,$_avil,PDO::PARAM_STR);
			$statment->bindParam(6,$proID,PDO::PARAM_STR);

			$statment->execute();
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}

	public function updateImg($_image, $_proID)
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="UPDATE `Product` SET `image`=? Where `productCode`=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$_image,PDO::PARAM_STR);
			$statment->bindParam(2,$_proID,PDO::PARAM_STR);
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}

	public function DeleteProduct($_proID)
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="DELETE FROM `Product` WHERE productCode=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$_proID,PDO::PARAM_STR);
			$statment->execute();
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}
}


?>