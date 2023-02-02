<?php 
   session_start();
   $title = "หน้าเข้าสู่ระบบ"; 
   require_once '../layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
   <div class="container">
      <h3 class="text-center mt-5">เข้าสู่ระบบเลยน้องงง</h3>
      <hr>
      <form action="../db/signin_db.php" method="post">
        <?php if(isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </div>
        <?php } ?>
         <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" >
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
         </div>
         <button type="submit" class="btn btn-success" name="signin">เข้าสู่ระบบ</button>
      </form>  
      <hr>
      <p>ยังไม่เป็นสมาชิกใช่ไหมจ๊ะ ? <a href="../index.php" >ไปสมัครก่อนเด้</a></p>
   </div>
</body>

</html>