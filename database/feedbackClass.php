<?php
require("connection.php");
class feed
{
    private $FeedID;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Contact;
    private $Feedback;

    public function SetFeedID($_feedID)
    {
        $this->FeedID = $_feedID;
    }
    public function GetFeedID()
    {
        return($this->FeedID);
    }

    public function SetFirstName($_firstName)
    {
        $this->FirstName = $_firstName;
    }

    public function GetFirstName()
    {
        return($this->FirstName);
    }

    public function SetLastName($_lastName)
    {
        $this->LastName = $_lastName;
    }

    public function GetLastName()
    {
        return($this->LastName);
    }

    public function SetEmail($_email)
    {
        $this->Email = $_email;
    }

    public function GetEmail()
    {
        return($this->Email);
    }

    public function SetContact($_contact)
    {
        $this->Contact = $_contact;
    }

    public function GetContact()
    {
        return($this->Contact);
    }
    
    public function SetFeedback($_feed)
    {
        $this->Feedback = $_feed;
    }

    public function GetFeedback()
    {
        return($this->Feedback);
    }
    
    public function AddFeedback()
    {
        try
        {
            $conn = Connection::GetConnection();
			$query ="INSERT INTO `feedbackTable`( `FeedbackID`, `FirstName`, `LastName`, `Email`, `Phone` ,`Feedback`) VALUES (?,?,?,?,?,?)";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->FeedID,PDO::PARAM_STR);
			$statment->bindParam(2,$this->FirstName,PDO::PARAM_STR);
			$statment->bindParam(3,$this->LastName,PDO::PARAM_STR);
            $statment->bindParam(4,$this->Email,PDO::PARAM_STR);
            $statment->bindParam(5,$this->Contact,PDO::PARAM_STR);
            $statment->bindParam(6,$this->Feedback,PDO::PARAM_STR);
			$statment->execute();
        }

        catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
    }

	public static function GetAllFeedBack()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="SELECT `FeedbackID`, `FirstName`, `LastName`, `Email`, `Phone`, `Feedback` FROM `feedbackTable` ";
			$statment= $conn->prepare($query);
			$statment->execute();
			$result = $statment->fetchall();
			$users = array();
			foreach($result as $item)
			{
				$newUser = new feed();
				$newUser->FeedID = $item["FeedbackID"];
				$newUser->FirstName = $item["FirstName"];
                $newUser->LastName = $item["LastName"]; 
                $newUser->Email = $item["Email"];
                $newUser->Contact = $item["Phone"]; 
                $newUser->Feedback = $item["Feedback"];
				array_push($users,$newUser);
			}

			return $users;   
		}
		
        catch(PDOException $ex)
		{
			echo($ex->getMessage());
		
		}
	}

    public function DeleteFeedback()
	{
		try
		{
			$conn = Connection::GetConnection();
			$query ="DELETE FROM `feedbackTable` WHERE FeedbackID=?";
			$statment= $conn->prepare($query);
			$statment->bindParam(1,$this->FeedID,PDO::PARAM_STR);
			$statment->execute();
		}
		catch(PDOException $ex)
		{
			echo($ex->getMessage());
		}
	}
}

