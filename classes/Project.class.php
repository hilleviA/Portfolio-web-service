<?php 
class Project {

    private $db;
    private $title;
    private $url;
    private $description;

    //Function constructor 
    function __construct(){
        $this->db = new mysqli (DBHOST, DBUSERNAME, DBPASSWORD, DBNAME);
        if($this->db->connect_errno > 0) {
            die ("Kunde inte ansluta till databasen. Fel: " . $this->db->connect_error);
        }
    }

    //Läser in samtliga projekt
    function getAllProjects() {
        $sql = "SELECT * FROM Projects";
        $result = $this->db->query($sql); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Läser in projekt med inskickat ID
    function getOneProject($id) {
        $sql = "SELECT * FROM Projects WHERE ID ='$id'";
        $result = $this->db->query($sql); 
        $thePost = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $thePost; 
    }
    
    //Lägger till nytt projekt
    function addNewProject() {
        $sql = "INSERT INTO Projects (ProjectTitle, ProjectUrl, ProjectDescription) VALUES ('$this->title', '$this->url', '$this->description');";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Uppdatera projekt
    function updateProject($id) {
        $sql = "UPDATE Projects SET ProjectTitle = '$this->title', ProjectUrl = '$this->url', ProjectDescription  = '$this->description'  WHERE ID ='$id';";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Ta bort ett projekt
    function deleteProject($id) {
        $sql = "DELETE FROM Projects WHERE ID = '$id'";
        $result =  $this->db->query($sql);
        return $result;
    }

    //Setters och getters för title
    function setTitle($title) {
        if($title != "") {
            $title = strip_tags($title);
            $this->title = $title;
            return true;
        }else {
            return false;
        }   
    }
    function getTitle() {
        return $this->title; 
    }
    
    //Setters och getters för url
    function setUrl($url) {
        if($url != "") {
            $url = strip_tags($url);
            $this->url = $url;
            return true;
        } else {
            return false;
        }   
    }
    function getProgram() {
        return $this->url; 
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
}

?>