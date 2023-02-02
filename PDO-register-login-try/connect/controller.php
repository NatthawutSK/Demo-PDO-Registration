<?php
class Controller
{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }

    function checkEmail($email)
    {
        try {
            $check_email = $this->db->prepare("SELECT email FROM users WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row_result = $check_email->fetch(PDO::FETCH_ASSOC);
            return $row_result;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }
    function insertUser($firstname, $lastname, $email, $password,$role)
    {
        try {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users(firstname, lastname, email, password, role)
                                        VALUES (:firstname, :lastname, :email, :password, :role)");
            $stmt->bindParam(":firstname", $firstname);
            $stmt->bindParam(":lastname", $lastname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $passwordHash);
            $stmt->bindParam(":role", $role);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }
    function checkUserLogin($email){
        try{
            $check_user = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $check_user->bindParam(":email", $email);
            $check_user->execute();
            $row = $check_user->fetch(PDO::FETCH_ASSOC);
            return $row;
        }catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }
    function getUserId($id){
        try{
            $stmt = $this->db->query("SELECT * FROM users WHERE id = $id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }
}
