<?php 
   session_start();
   $title = "สมัครสมาชิก";
   require_once 'layout/header.php';
   require_once 'connect/db.php'
?>

<body>
   <div class="container">
      <h3 class="text-center mt-5">Test PDO Register-login</h3>
      <hr>
      <form action="db/signup_db.php" method="post">
         <?php if(isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger" role="alert">
               <?php 
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
               ?>
            </div>
         <?php } ?>

         <?php if(isset($_SESSION['warning'])) { ?>
            <div class="alert alert-warning" role="alert">
               <?php 
                  echo $_SESSION['warning'];
                  unset($_SESSION['warning']);
               ?>
            </div>
         <?php } ?>

         <?php if(isset($_SESSION['success'])) { ?>
            <div class="alert alert-success" role="alert">
               <?php 
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
               ?>
            </div>
         <?php } ?>
         <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" name="firstname">
         </div>
         <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lastname">
         </div>
         <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" >
         </div>
         <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
         </div>
         <div class="mb-3">
            <label for="confirm password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="c_password">
         </div>
         <button type="submit" class="btn btn-success" name="signup">สมัคร</button>
      </form>  
      <hr>
      <p>เป็นสมาชิกแล้วใช่ไหมจ๊ะ ? <a href="page/signin.php" >เข้าสู่ระบบ</a></p>
   </div>
</body>

</html>