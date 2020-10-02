<?php 

    $filepath = realpath(dirname(__FILE__));
    require_once $filepath."../../database/database.php";

    class Register{
        private $db;
        private $username;
        private $email;
        private $password;
        private $table = "users";

        public function __construct(){
            $this->db = new DB();
        }

        public function setData($username, $password, $email ){
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        public function insert(){
            $query = "INSERT INTO $this->table (username,password,email)
                      VALUES('$this->username','$this->password','$this->email')";
            $insert_row = $this->db->insert($query);
            return $insert_row;
        }

        public function checkUserAndEmail()
        {
            $query = "SELECT * FROM $this->table WHERE username = '$this->username' or email='$this->email' ";
            $result = $this->db->select($query);
            return $result;
        }
    }   

?>