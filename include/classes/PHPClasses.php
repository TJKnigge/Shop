<?php 

class Database {
    private $hostname = 'localhost';
    private $databasenaam = 'seedsofknowledge';
    private $username = 'root';
    private $password = '';
    public $conn;
    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->databasenaam);
        } catch (mysqli_sql_exception $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}

class user {
    public $id = null;
    public $name;
    public $email;
    public $password;
    public $role;
    public function __construct($name, $email, $password, $role) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }
    public function getid() {
        return $this->id;
    }
    public function setid($id) {
        $this->id = $id;
    }
    public function getname() {
        return $this->name;
    }
    public function setname($name) {
        $this->name = $name;
    }
    public function getemail() {
        return $this->email;
    }
    public function setemail($email) {
        $this->email = $email;
    }
    public function getpassword() {
        return $this->password;
    }
    public function setpassword($password) {
        $this->password = $password;
    }
    public function getrole() {
        return $this->role;
    }
    public function setrole($role) {
        $this->role = $role;
    }
  
   
    public function addaccount() {
        $sql = "INSERT INTO `user`(`name`, `email`, `password`, `role`) VALUES";
        $sql .= " ('$this->name','$this->email','$this->password','$this->role')";
        $connection = new Database();
        $result = $connection->conn->query($sql);
        session_start();
        $_SESSION["name"] = $this->name;
        $connection->conn->close();
        header("location: login.php");
    }
    
    public function deleteaccount(){
        
        
    }

        public function signin() {
        $sql = "SELECT * FROM `user` WHERE `email`= BINARY '$this->email' AND `password`= BINARY '$this->password'";
        $connection = new Database();
        $result = $connection->conn->query($sql);
        if (isset($result)) {
            if ($result->num_rows <= 0) {
                return "email or password does not match";
            } else {
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION["name"] = $row['name'];
                $connection->conn->close();
                header("location: index.php");
            }
        }
    }

}
