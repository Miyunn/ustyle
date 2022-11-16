<?php
require("connection.php");
class Content
{
    public $ID;
	public $Description;
    public $Value;

    public function setContentID($_ID)
    {
        $this->ID = $_ID;
    }
    public function getContentID()
    {
        return($this->ID);
    }

	public function setDescription($_Descrip)
	{
		$this->Description = $_Descrip;
	}

	public function getDescription()
	{
		return($this->$Description);
	}

    public function setContentValue($_Value)
    {
        $this->Section = $_Section;
    }

    public function getContentValue()
    {
        return($this->Value);
    }

    public function GetAll()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `ID`, `description`, `value` FROM `content`";
			$statment= $conn->prepare($query);
			$statment->execute();
			$result = $statment->fetchall();
			$contents = array();
			foreach($result as $item)
			{
				$contentNew = new Content();
				$contentNew->ID = $item["ID"];
				$contentNew->Page = $item["Page"];
				$contentNew->Section = $item["Section"];
				$contentNew->Value = $item["value"];
				
				array_push($contents,$contentNew);
			}

			return $contents;
			
		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}
		
	public function GetContent()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `Value` FROM `content` WHERE `ID`=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->ID,PDO::PARAM_INT);
			$statment->execute();
			
			$result = $statment->fetchall();
			$this->Value = $result[0]["Value"];

		}

		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
		
	}
	
	public function updateImg($_image, $_update)
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="UPDATE `content` SET `Value`=? Where `ID`=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$_image,PDO::PARAM_STR);
			$statment->bindParam(2,$_update,PDO::PARAM_STR);
			$statment->execute();
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}

	public function updateNews($_news, $_update)
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="UPDATE `content` SET `Value`=? Where `ID`=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$_news,PDO::PARAM_STR);
			$statment->bindParam(2,$_update,PDO::PARAM_STR);
			$statment->execute();
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}
}

?>
