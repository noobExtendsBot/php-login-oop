<?php 
    class Database {
        private $host = "localhost:3306";
        private $db_name = "assignment";
        private $username = "root";
        private $password = "";
        private $conn;

        public function getConnection(){
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                //echo "Connection successful";
            } catch(PDOException $e){
                echo $e->getMessage();
            }

            return $this->conn;
        }



    }
?>