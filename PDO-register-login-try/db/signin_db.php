<?php 
   
   session_start();
   require_once '../connect/db.php';

   if (isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

     if(empty($email)){
        $_SESSION['error'] = 'กรอกอีเมลด้วยยยยยย';
        header("location: ../page/signin.php");
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = 'มึงรู้จักอีเมลไหมเนี้ยย';
        header("location: ../page/signin.php");
    } else if(empty($password)){
        $_SESSION['error'] = 'กรอกรหัสด้วยยยยยย';
        header("location: ../page/signin.php");
    } else if (strlen($password) > 20 || strlen($password) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: ../page/signin.php");
    } else{
        try{
            $check_user = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $check_user->bindParam(":email", $email);
            $check_user->execute();
            $row = $check_user->fetch(PDO::FETCH_ASSOC);

            if($check_user->rowCount() > 0){
                if($row['email'] == $email){
                    if(password_verify($password, $row['password'])){
                        if($row['role'] == 'user'){
                            $_SESSION['user_login'] = $row['id'];
                            header("location: ../page/user.php");
                        } 
                        else if($row['role'] == 'admin'){
                            $_SESSION['admin_login'] = $row['id'];
                            header("location: ../page/admin.php");
                        }
                    } 
                    else{
                        $_SESSION['error'] = "รหัสผ่านผิดโว้ย";
                        header("location: ../page/signin.php");
                    }
                } 
                else {
                    $_SESSION['error'] = "อีเมลผิดโว้ย";
                    header("location: ../page/signin.php");
                }
            }
            else {
                $_SESSION['error'] = "ไม่มีข้อมูลมึงในระบบจ้า";
                header("location: ../page/signin.php");
            }
            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }
   



   }

?>