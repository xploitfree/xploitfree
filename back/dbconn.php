<?php
    class Db_Connect{

        private $db_hostname = "localhost";
        private $db_username = "root";
        private $db_password = "";
        private $db_name = "xploitfree";
        private $connection;

        public function get_connection(){

            $this->connection = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_name);

            if ($this->connection->connect_errno) {
                echo "Failed to connect to MySQL: ".$this->connection->connect_error;
                exit();
            }else{
                return $this->connection;
            }
        } 
    }
?>