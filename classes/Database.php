<?php
    class Database{
        private $server_name = "localhost"; //127.0.0.1
        private $username = "root"; // by default
        private $db_password = ""; // In mamp = root, xammp = ""
        private $db_name = "the_company";
        protected $conn;

        public function __construct(){
            $this->conn = new mysqli($this->server_name, $this->username, $this->db_password, $this->db_name);

            if ($this->conn->connect_error) { //if this is true
                die("Unable to connect to the database " . $this->conn->connect_error);
            }
        }

    }
?>