<?php 
    class User{
        private $table_name = "user";

        public $user_id;
        public $full_name;
        public $email;         
        public $mobile_no;   
        public $password;  
        public $designation;                                              
        public $conn;

        function __construct($db){
            $this->conn = $db;
        }

        function verifyUser(){
            $query = "SELECT FullName, Password, DegID FROM ".$this->table_name." WHERE Email = :email";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":email", $this->email);

            if($stmt->execute()){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $this->password = $row['Password'];
                    $this->designation = $row['DegID'];
                    $this->full_name = $row['FullName'];
                }
                return true;
            }
            return false;
        }

        public function createUser(){
            $query = "INSERT INTO ".$this->table_name." SET FullName = :name, Email = :email, Mobile = :mobile, Password = :password, DegID = :designation";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":name", $this->full_name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":mobile", $this->mobile_no);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":designation", $this->designation);
            if($stmt->execute()){
                return true;
            }

            return false;
        }

        public function emailExist(){
            $query = "SELECT UserID FROM ".$this->table_name." WHERE Email = :email";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":email", $this->email);
            if($stmt->execute()){
                $num = $stmt->rowCount();
                if($num > 0){
                    return true;
                }
            }
            return false;
        }

        public function getUserList(){
            $query = "SELECT FullName, Email, Mobile, DegRole FROM ".$this->table_name." INNER JOIN `designation` ON user.DegID = designation.DegID";
            $stmt = $this->conn->prepare($query);

            if($stmt->execute()){
                return $stmt;
            }
        }
        
    }

?>