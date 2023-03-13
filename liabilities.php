<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if (isset($_POST["submit"])) {
  $Creditor = isset($_POST["Creditor"]) ? $_POST["Creditor"] :''; 
  $Liability = isset($_POST["Liability"]) ? $_POST["Liability"] :'';
  $Mpayment = isset($_POST["Mpayment"]) ? $_POST["Mpayment"] :'';

  // Insert the data into the database
  $sql = "INSERT INTO tb_liabilities (Creditor,Liability, Mpayment) VALUES ('$Creditor','$Liability', '$Mpayment')";
  if (mysqli_query($conn, $sql)) {
    // success
    echo "<script> alert('Details saved Successful') ;</script>";

    header("location:guarantor.php");

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
   
    <title>Liabilities</title>
</head>

<body>
    <form method="POST" >
        <div class="container bg-info" style="max-width: 900px;">
            <div class="container form-span">
                <h4>Liabilities</h4>
                <hr size="4" color="danger" width="100%" class="bg-white">

                <p>List below all liabilities & indebtedness to banks, credit unions, stores, finance companies, individuals and other creditors, including obligations to pay alimony, child support, separate maintenance,
                    rent, mortgages, etc.</p>

                <div class=" d-flex " >
                    <div class="p-2">
                        <label for="myTextarea" >Creditor</label><br>
                        <textarea name=" Creditor" id="Creditor" rows="5" cols="20"></textarea>
                    </div>
                    
                    <div class="p-2">
                        <label for="myTextarea">Liabilities</label><br>
                        <textarea name="Liability" id="Liability" rows="5" cols="20"></textarea>
                    </div class="p-2">
                   
                    <div class="p-2">
                        <label for="myTextarea">Monthly Payments</label> <br>
                        <textarea name="Mpayment" id="Mpayment" rows="5" cols="20"></textarea>
                    </div>
                </div>

    <input type="submit" name="submit" value="submit" class="mx-auto d-block">
    </form>

</body>

</html>