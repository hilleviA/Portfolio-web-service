<?php 
class Employment {

    private $db;
    private $employer;
    private $title;
    private $description;
    private $startDate;
    private $endDate;

    //Function constructor 
    function __construct(){
        $this->db = new mysqli (DBHOST, DBUSERNAME, DBPASSWORD, DBNAME);
        if($this->db->connect_errno > 0) {
            die ("Kunde inte ansluta till databasen. Fel: " . $this->db->connect_error);
        }
    }

    //Läser in samtliga jobb
    function getAllEmployments() {
        $sql = "SELECT * FROM Employments";
        $result = $this->db->query($sql); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Läser in jobb med medskickat ID
    function getOneEmployment($id) {
        $sql = "SELECT * FROM Employments WHERE ID ='$id'";
        $result = $this->db->query($sql); 
        $thePost = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $thePost; 
    }

    //Lägger till ny anställning
    function addNewEmployment() {
        $sql = "INSERT INTO Employments (EmploymentName, EmploymentTitle, EmploymentDescription, StartDate, EndDate) VALUES ('$this->employer', '$this->title', '$this->description', '$this->startDate', '$this->endDate');";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Uppdatera anställning
    function updateEmployment($id) {
        $sql = "UPDATE Employments SET EmploymentName = '$this->employer', EmploymentTitle = '$this->title', EmploymentDescription  = '$this->description', StartDate = '$this->startDate', EndDate = '$this->endDate' WHERE ID = '$id';";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Tar bort en anställning
    function deleteEmployment($id) {
        $sql = "DELETE FROM Employments WHERE ID = '$id'";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Setter och getter för employer
    function setEmployer($employer) {
        if($employer!= "") {
            $employer = strip_tags($employer);
            $this->employer = $employer;
            return true;
        } else {
            return false;
        }   
    }

    function getEmployer() {
        return $this->employer; 
    }
    
    //Setters och getters för title
    function setTitle($title) {
        if($title != "") {
            $title = strip_tags($title);
            $this->title = $title;
            return true;
        } else {
            return false;
        }   
    }
    function getTitle() {
        return $this->title; 
    }
    
    //Setters och getters för description
    function setDescription($description) {
        if($description!= "") {
            $description = strip_tags($description);
            $this->description = $description;
            return true;
        }
        return false;    
    }

    function getDescription() {
        return $this->description; 
    }

    //Setters och getters för startDate
    function setStartDate($startDate) {
        if($startDate !="") {
            $startDate = strip_tags($startDate);
            $this->startDate = $startDate;
            return true;
        } else {
            return false;
        }  
    }
    function getStartDate() {
        return $this->startDate; 
    }

    //Setters och getters för endDate
    function setEndDate($endDate) {
        if($endDate !="") {
            $endDate = strip_tags($endDate);
            $this->endDate = $endDate;
            return true;
        } else {
            return false;
        }  
    }
    function getEndDate() {
        return $this->endDate; 
    }


}




?>