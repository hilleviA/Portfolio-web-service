<?php 
class Education {

    private $db;
    private $school;
    private $program;
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

    //Läser in samtliga utbildningar
    function getAllEducations() {
        $sql = "SELECT * FROM Educations";
        $result = $this->db->query($sql); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Läser in utbildning med medskickat ID
    function getOneEducation($id) {
        $sql = "SELECT * FROM Educations WHERE ID ='$id'";
        $result = $this->db->query($sql); 
        $thePost = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $thePost; 
    }
    
    //Lägger till ny utbildning
    function addNewEducation() {
        $sql = "INSERT INTO Educations (SchoolName, ProgramName, ProgramDescription, StartDate, EndDate) VALUES ('$this->school', '$this->program', '$this->description', '$this->startDate', '$this->endDate');";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Uppdatera utbildning
    function updateEducation($id) {
        $sql = "UPDATE Educations SET SchoolName = '$this->school', ProgramName = '$this->program', ProgramDescription  = '$this->description', StartDate = '$this->startDate', EndDate = '$this->endDate'  WHERE ID ='$id';";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Ta bort en utbildning
    function deleteEducation($id) {
        $sql = "DELETE FROM Educations WHERE ID = '$id'";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Setters och getters för school
    function setSchool($school) {
        if($school != "") {
            $school = strip_tags($school);
            $this->school = $school;
            return true;
        }else {
            return false;
        }   
    }
    function getSchool() {
        return $this->school; 
    }
    
    //Setters och getters för program
    function setProgram($program) {
        if($program != "") {
            $program = strip_tags($program);
            $this->program = $program;
            return true;
        } else {
            return false;
        }   
    }
    function getProgram() {
        return $this->program; 
    }
    
    //Setters och getters för description
    function setDescription($description) {
        if($description != "") {
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