<?php 
   session_start();
   $title = "หน้าแอดมิน";
   require_once '../layout/header.php';
   require_once '../connect/db.php';
   if(!isset($_SESSION['admin_login'])){
    $_SESSION['error'] = "ฮั่นแน่ เฉพาะ admin เท่านั้นนะน้อง";
    header('location: signin.php');
   } else{
        $admin_id = $_SESSION['admin_login'];
        $row = $controller->getUserId($admin_id);
    }
?>

<body>
    <div class="container">
       <h3 class="mt-4">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    
</body>
</html>