<?php
class Authentication {
    public $username;
    public $password;
    public $authenticatedUser = "vensz";
    public $authenticatedPassword = "1234";

    function __construct() {
        
    }

    public function login($usr, $pswd) {
        $this->username = $usr;
        $this->password = $pswd;
        if($this->authenticatedUser == $this->username && 
        $this->authenticatedPassword == $this->password) {
            $_SESSION["uid"] = $this->username;
            header("Location: homepage.php");
        } else {
            header("Location: index.php");
        }
    
    }
    
    public function logout() {
        $_SESSION["uid"] = "";
        session_destroy();
        header("Location: index.html");
    }

}
