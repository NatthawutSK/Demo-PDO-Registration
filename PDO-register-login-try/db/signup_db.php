<?php 
   
   session_start();
   require_once '../connect/db.php';
   

   if (isset($_POST['signup'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $role = 'user';

    if (empty($firstname)){
        $_SESSION['error'] = 'กรอกชื่อด้วยยยยยย';
        header("location: ../index.php");
    } else if(empty($lastname)){
        $_SESSION['error'] = 'กรอกนามสกุลด้วยยยยยย';
        header("location: ../index.php");
    } else if(empty($email)){
        $_SESSION['error'] = 'กรอกอีเมลด้วยยยยยย';
        header("location: ../index.php");
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = 'มึงรู้จักอีเมลไหมเนี้ยย';
        header("location: ../index.php");
    } else if(empty($password)){
        $_SESSION['error'] = 'กรอกรหัสด้วยยยยยย';
        header("location: ../index.php");
    } else if (strlen($password) > 20 || strlen($password) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: ../index.php");
    } else if (empty($c_password)) {
        $_SESSION['error'] = 'ยืนยันรหัสผ่านด้วยยยยย';
        header("location: ../index.php");
    } else if ($c_password != $password) {
        $_SESSION['error'] = 'รหัสไม่ตรงกันโว้ย ความจำสั้นหรอ ?';
        header("location: ../index.php");
    } else{
        try{
            $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if($row['email'] == $email){
                $_SESSION['warning'] = 'มีอีเมลนี้ในระบบล้าวว <a href="page/signin.php" class="alert-link">เข้าสู่ระบบ</a>';
                header("location: ../index.php");
            } else if(!isset($_SESSION['error'])){
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, email, password, role)
                                        VALUES (:firstname, :lastname, :email, :password, :role)");
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":role", $role);
                $stmt->execute();
                $_SESSION['success'] = "สมัครสมาชิกเรียบร้อย <a href='page/signin.php' class='alert-link'>เข้าสู่ระบบ</a>";
                header('location: ../index.php');
            } else{
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header('location: ../index.php');
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }
   



   }

?>