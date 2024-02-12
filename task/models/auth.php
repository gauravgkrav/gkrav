<?php 
require_once 'config.php';

class auth extends config{
    public function user(){
        $sql="SELECT * FROM user";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function login($email, $pass) {
        try {
            // Prepare SQL statement to fetch user with given email
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password if user found
            if ($user && password_verify($pass, $user['password'])) {
                // Password correct, return true for successful login
                return true;
            } else {
                // Password incorrect or user not found, return false
                return false;
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false; // Or handle the error in a different way
        }
    }
    
    public function emailverify($email){
        $sql = "SELECT COUNT(*) AS count FROM user WHERE email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":email" => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['count'] > 0;
    }
    
    
    
      
}
?>