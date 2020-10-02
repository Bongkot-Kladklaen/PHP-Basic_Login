<?php 
    $filepath = realpath(dirname(__FILE__));
    require_once $filepath."../../config/config.php";

    class DB{
        private $hostname = DB_HOST;
        private $username = DB_USER;
        private $password = DB_PASS;
        private $database = DB_NAME;

        public $connectServer;
        public $error;

        public function __construct(){
            $this->connectDB();
        }
        
        private function connectDB(){
            // Create connection
            $this->connectServer = new mysqli($this->hostname, $this->username, $this->password, $this->database);
            // Check connection
            if ($this->connectServer->connect_error) {
                die('Connection failed: ' . $this->connectServer->connect_error);
                return false;
            }
        }

        // Insert Data
        public function insert($query){
            $insert_row = $this->connectServer->query($query) or die($this->connectServer->error.__LINE__);
            if ($insert_row) {
                return $insert_row;
            } else {
                return false;
            }
        }

        // Select Data
        public function select($query){
            $result = $this->connectServer->query($query) or die($this->connectServer->error.__LINE__);
            if($result->num_rows > 0) {
                return $result;
            } else {
                return false;
            }
        }
    }


?>