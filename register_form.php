<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

@include 'config.php';


if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = ($_POST['password']);
   $cpassword = ($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM tb_admin WHERE email = '$email' && password = '$password' ";

   
  // Sanitize user input
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
  $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

  // Check if email already exists in database
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM tb_admin WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<script>alert('Email already exists in database.');</script>";
     
    } else {
      // Insert new user into database
      $sql = "INSERT INTO tb_admin (name, email, password, user_type) VALUES ('$name', '$email', '$password', '$user_type')";
      
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New member added successfully.'); </script>";
        header("location:admin.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
   <title>Registration form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login now</a></p>
   </form>

</div>

</body>
</html>