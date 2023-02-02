<?php 

    session_start();
    $title = "หน้าผู้ใช้";
    require_once '../layout/header.php';
    require_once '../connect/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'ฮั่นแน่ login ก่อนนะน้อง';
        header('location: signin.php');
    }

?>

<body>
    <div class="container">
        <?php 

            if (isset($_SESSION['user_login'])) {
                $user_id = $_SESSION['user_login'];
                $stmt = $conn->prepare("SELECT * FROM users WHERE id = $user_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        <h3 class="mt-4">Welcome, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h3>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>