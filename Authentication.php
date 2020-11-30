<?php
class Authentication {
    private $username;
    private $password;
    private $authenticatedUser;
    private $authenticatedPassword;

    private $servername = "localhost";
    private $db = "Parking";
    private $db_username = "root";
    private $db_password = "";

    private $connection;

    function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->db_username, $this->db_password);
            
            // $this->connection->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMesssage();
        }
    }

    public function login($usr, $pswd) {
        $this->username = $usr;
        $this->password = $pswd;
        if($this->authenticatedUser == $this->username && 
        $this->authenticatedPassword == $this->password) {
            $_SESSION["uid"] = $this->username;
            header("Location: homepage.php");
        } else {
            header("Location: index.html");
        }
    
    }
    
    public function logout() {
        $_SESSION["uid"] = "";
        session_destroy();
        header("Location: index.html");
    }

    private function insertUserData($username, $password) {
        $sql = "INSERT INTO 
                    user_credentials(id, username, password)
                VALUE (NULL, '".$username."', '".$password."')"
        $this->connection->exec($sql);
        return true;
    }

    private function getUserData() {

    }

}
