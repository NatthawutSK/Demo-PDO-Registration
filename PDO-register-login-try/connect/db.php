<?php 
   $servername = "localhost";
   $username = "root";
   $password = "";
   $db= "try-register"; // ใส่ชื่อ database ที่สร้าง
   $dsn = "mysql:host=$servername;dbname=$db";
   
   try {
     $conn = new PDO($dsn, $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Connected successfully";
   } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
   }

   require_once 'connect/controller.php';
   $controller = new Controller($conn);
?>