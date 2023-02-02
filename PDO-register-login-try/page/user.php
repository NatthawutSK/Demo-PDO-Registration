<?php 
    session_start();
    $title = "หน้าผู้ใช้";
    require_once '../layout/header.php';
    require_once '../connect/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'ฮั่นแน่ login ก่อนนะน้อง';
        header('location: signin.php');
    } else{
        $user_id = $_SESSION['user_login'];
        $row = $controller->getUserId($user_id);
    }
?>

<body>
    <div class="container">
        <h3 class="mt-4">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>