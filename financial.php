<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if (isset($_POST["submit"])) {

  $Bank = '';
  if (isset($_POST["Bank"])) {
    $Bank = $_POST["Bank"];
  }
  $Branch = '';
  if (isset($_POST["Branch"])) {
    $Branch = $_POST["Branch"];
  }
  $Account = '';
  if (isset($_POST["Account"])) {
    $Account = $_POST["Account"];
  }
  $Atype = '';
  if (isset($_POST["Atype"])) {
    $Atype = $_POST["Atype"];
  }


   // Insert the data into the database
   $sql = "INSERT INTO  tb_financial (Bank, Branch, Account, Atype )
   VALUES ('$Bank', '$Branch', '$Account', '$Atype')";

   

   if (mysqli_query($conn, $sql)) {
       // success
       echo "<script> alert('Details saved Successful') ;</script>";
       header("location:loan.php");
   } else {
       // error
       echo "<script> alert('Registration Fail Try Again') ;</script>";
   }
    // Close the connection
    mysqli_close($conn);

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
  
  <title>Financial References</title>
</head>

<body>
  <form method="post">
    <div class="container bg-info" style="max-width: 900px;">
      <div class="container form-span">
        <hr size="4" color="danger" width="100%" class="bg-white">
        <h5>Financial References</h5>
        <hr size="4" color="danger" width="100%" class="bg-white">
        <h6> Bank Name: </h6>
        <input type="text" class=" col-sm-5" name="Bank">
        <small class="form-text text-muted"></small>
        <br>
        Branch Name: <br>
        <input type="text" class="col-sm-5" name="Branch">
        <small class="form-text text-muted"></small>
        <br>
        <h6> Account Number:</h6>
        <input type="text" class=" col-sm-3" name="Account">
        <small class="form-text text-muted"></small>
        <br><br>
        <h6>Account Type:</h6>
        <div class="  col-sm-5">
          <input type="radio" name="Atype" <?php if (isset($account) && $account == "account") echo "checked"; ?> value="Saving Account "> Saving Account <br>
          <input type="radio" name="Atype" <?php if (isset($account) && $account == "account") echo "checked"; ?> value="Current Account "> Current Account <br>
          <input type="radio" class="form-radio-Other form-radio" name="Atype" id="other-23" <?php if (isset($purpose) && $purpose == "purpose") echo "checked"; ?> value="Others">
          <label id="label-other-23" for="Other-23"></label>
          <input type="text" class="form-radio-other-input form-textbox" name="q23_typeOf[other]" data-otherhint="Other" size="15" id="input_23" placeholder="Other">



          <input type="submit" name="submit" value="submit" class="mx-auto d-block">
  </form>

</body>

</html>