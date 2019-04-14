<?php 
    class Designation {
        private $table_name = "designation";

        public $deg_id;
        public $deg_role;
        public $conn;

        function __construct($db){
            $this->conn = $db;
        }

        public function getDegList(){
            $query = "SELECT * FROM ".$this->table_name;
            $stmt = $this->conn->prepare($query);

            if($stmt->execute()){
                return $stmt;
            }

            return false;
        }
    }
?>