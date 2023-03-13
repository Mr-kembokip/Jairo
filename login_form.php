<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ob_start();
session_start();
error_reporting(E_ALL);

@include 'config.php';

if(isset($_POST['submit'])){

   $name = '';
   if (isset($_POST["name"])) {
       $name = $_POST["name"];
   }
   $email = '';
   if (isset($_POST["email"])) {
       $email = $_POST["email"];
   }

   $password = '';
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }
    $cpassword = '';
    if (isset($_POST["cpassword"])) {
        $cpassword = $_POST["cpassword"];
    }
    $user_type = '';
    if (isset($_POST["user_type"])) {
        $user_type = $_POST["user_type"];
    }
   

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $stmt = mysqli_prepare($conn, "SELECT * FROM tb_admin WHERE email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      if ($password ==$row['password']) {
        // User is authenticated, create session
    
      //   die(print_r($row));
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["name"];
       
        if ($row["user_type"] == "admin") {
             
         $_SESSION["user_id"] = $row["id"];
         $_SESSION["user_name"] = $row["name"];
         $_SESSION["user_type"] =$row["user_type"];
         
          // User is an admin, redirect to admin dashboard
         //  header("Location:tables.sql");
          header("Location: admin.php");
          exit();
        } else {
         $_SESSION["user_id"] = $row["id"];
         $_SESSION["user_name"] = $row["name"];
         $_SESSION["user_type"] =$row["user_type"];
          // User is not an admin, redirect to regular user dashboard
          header("Location: index.php");
          exit();
        }
      } else {
        // Password is incorrect, display error message
        echo "Incorrect password.";
      }
    } else {
      // Email is not found, display error message
      echo "Email not found";
    }
   }
    
?>

<!--         tb_description, 	tb_details, tb_financial, 	tb_guarantor, tb_liabilities, 	tb_loan, 	tb_pdetails, tb_sign, 	tb_user -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">


   <form action="" method="POST">
  
   <h1>welcome To Login Page </h1>
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>

</div>

</body>
</html>