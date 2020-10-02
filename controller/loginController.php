<?php 

    $filepath = realpath(dirname(__FILE__));
    require_once $filepath."../../database/database.php";
    
    class Login{
        private $db;
        private $username;
        private $password;
        private $table = "users";

        public function __construct(){
            $this->db = new DB();
        }
        public function setData($username, $password){
            $this->username = $username;
            $this->password = $password;
        }
        public function select(){
            $query = "SELECT * FROM $this->table WHERE username = '$this->username' AND password='$this->password' ";
            $result = $this->db->select($query);
            return $result;
        }
    }

?>