<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if (isset($_POST["submit"])) {
  $Ldetails = isset($_POST["Ldetails"]) ? $_POST["Ldetails"] : '';
  $Lamount = isset($_POST["Lamount"]) ? $_POST["Lamount"] : '';
  $Terms = isset($_POST["Terms"]) ? $_POST["Terms"] : '';

  // Insert the data into the database
  $sql = "INSERT INTO tb_loan (Ldetails, Lamount, Terms) VALUES ('$Ldetails', '$Lamount', '$Terms')";
  if (mysqli_query($conn, $sql)) {
    // success
    echo "<script> alert('Details saved Successful') ;</script>";

    header("location:liabilities.php");

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
 
  <title>Loan Details</title>
</head>

<body>
  <form method="POST">
    <div class="container bg-info" style="max-width: 900px;">
      <div class="container form-span">
        <span>
          <hr size="4" color="danger" width="100%" class="bg-white " >
          <h4 >Loan Details</h4>
          <hr size="4" color="danger" width="100%" class="bg-white" >
          <h6>Purpose of Personal Loan</h6>
        </span>
        <div class="  col-sm-5">
          <input type="radio" name="Ldetails" <?php if (isset($purpose) && $purpose == "Purchase of vehicle") echo "checked"; ?> value="Purchase of vehicle"> Purchase of vehicle<br>
          <input type="radio" name="Ldetails" <?php if (isset($purchase) && $purchase == "Purchase of office equipment") echo "checked"; ?> value="Purchase of office equipment"> Purchase of office equipment <br>
          <input type="radio" name="Ldetails" <?php if (isset($travel) && $trave == "Travel") echo "checked"; ?> value="Travel"> Travel <br>
          <input type="radio" name="Ldetails" <?php if (isset($take) && $take == "Takeover of existing personal loan") echo "checked"; ?> value="Takeover of existing personal loan"> Takeover of existing personal loan<br>
          <input type="radio" class="form-radio-Other form-radio" name="Ldetails" id="other-23" <?php if (isset($others) && $others == "others") echo "checked"; ?> value="Oters">
          <label id="label-other-23" for="Other-23"></label>
          <input type="text" class="form-radio-other-input form-textbox" name="q23_typeOf[other]" data-otherhint="Other" size="15" id="input_23" placeholder="Other">
          <br>
        </div>
        <h5>Requested Personal Loan Amount</h5>
        <input type="text" class="id" placeholder="ex:23" name="Lamount"><br>
        <small class="form-text text-muted">in USD</small>

        <h5>Terms in (months)</h5>
        <input type="text" class="id" placeholder="ex:23" name="Terms"><br>

        <hr size="4" color="danger" width="100%" class="bg-white">
  

  <input type="submit" name="submit" value="submit" class="mx-auto d-block">
  </form>

</body>

</html>