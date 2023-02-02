<?php 
   session_start();
   $title = "หน้าแอดมิน";
   require_once '../layout/header.php';
   require_once '../connect/db.php';
   if(!isset($_SESSION['admin_login'])){
    $_SESSION['error'] = "ฮั่นแน่ เฉพาะ admin เท่านั้นนะน้อง";
    header('location: signin.php');

   }
?>

<body>
    <div class="container">
        <?php 
            if(isset($_SESSION['admin_login'])){
                $admin_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
       <h3 class="mt-4">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    
</body>
</html>