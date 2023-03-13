<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if (isset($_POST["submit"])) {
    $F_name = isset($_POST["F_name"]) ? $_POST["F_name"] : '';
    $L_name = isset($_POST["L_name"]) ? $_POST["L_name"] : '';
    $Relative = isset($_POST["Relative"]) ? $_POST["Relative"] : '';
    $J_title = isset($_POST["J_title"]) ? $_POST["J_title"] : '';
    $W_address = isset($_POST["W_address"]) ? $_POST["W_address"] : '';
    $W_address2 = isset($_POST["W_address2"]) ? $_POST["W_address2"] : '';
    $City = isset($_POST["City"]) ? $_POST["City"] : '';
    $Province = isset($_POST["Province"]) ? $_POST["Province"] : '';
    $Zip_code = isset($_POST["Zip_code"]) ? $_POST["Zip_code"] : '';
    $M_income = isset($_POST["M_income"]) ? $_POST["M_income"] : '';
    $T_id = isset($_POST["T_id"]) ? $_POST["T_id"] : '';
    $Id_no = isset($_POST["Id_no"]) ? $_POST["Id_no"] : '';
    $Zip = isset($_POST["Zip"]) ? $_POST["Zip"] : '';
    $Phone = isset($_POST["Phone"]) ? $_POST["Phone"] : '';


    // Insert the data into the database
    $sql = "INSERT INTO tb_guarantor (F_name, L_name, Relative, J_title, W_address, W_address2, City, Province, Zip_code, M_income, T_id, Id_no, Zip, Phone) 
  VALUES ('$F_name', '$L_name', '$Relative', '$J_title', '$W_address', '$W_address2', '$City', '$Province', '$Zip_code', '$M_income', '$T_id', '$Id_no', '$Zip', '$Phone')";
   if (mysqli_query($conn, $sql)) {
        // success
        echo "<script> alert('Details saved Successful') ;</script>";

        header("location:sign.php");

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
    
    <title>Guarantor</title>
</head>

<body>
    <form method="POST" >
        <div class="container bg-info" style="max-width: 900px;">
            <div class="container form-span">

                <hr size="4" color="white" width="100%" class="bg-white">
                <h5>Guarantor</h5>
                <hr size="4" color="white" width="100%" class="bg-white">
                Name
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="F_name">
                        <small class="form-text text-muted">First Name</small>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="L_name">
                        <small class="form-text text-muted">Last Name</small>

                    </div>
                </div>

                <h5>Relationship with Applicant</h5>
                <input type="Relative" name="Relative"> <br>

                <h6>Place of Work: </h6>
                <input type="text" class="form-control" name="P_work">
                <small class="form-text text-muted">work place</small>
                <br>
                <h6>Job Title: </h6>
                <input type="text" class="form-control" name="J_title">
                <small class="form-text text-muted">job title</small>

                <br>

                <label for="home address">Work Address:</label><br>
                <div class="form-group">
                    <input type="text" class="id" name="W_address"><br>
                    <small class="form-text text-muted">Streat Address</small><br>
                    <input type="text" class="id" name="W_address2"><br>
                    <small class="form-text text-muted"> Street Address Line 2</small>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="City">
                            <small class="form-text text-muted"> City</small>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="Province">
                            <small class="form-text text-muted"> State/Province</small>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="Zip_code">
                        <small class="form-text text-muted"> Postal / Zip Code</small>
                    </div>

                    <br>
                    Monthly Net Income: <br>
                    <input type="text" class="id" placeholder="ex:23" name="M_income"><br>
                    <small class="form-text text-muted">in USD</small>
                    <br>
                    Type of ID: <br>
                    <div class="ID pl-4">
                        <input type="radio" name="T_id" <?php if (isset($Id) && $Id == "Passport") echo "checked"; ?> value="Passport"> Passport <br>
                        <input type="radio" name="T_id" <?php if (isset($Id) && $Id  == "Driver Licence") echo "checked"; ?> value="Driver Licence"> Driver Licence <br>
                        <input type="radio" name="T_id" <?php if (isset($Id) && $Id  == "Voter ID") echo "checked"; ?> value="Voter ID"> Voter ID<br>
                        <input type="radio" name="T_id" <?php if (isset($Id) && $Id  == "Social Security Number") echo "checked"; ?> value="Social Security Number"> Social Security Number<br>
                        <input type="radio" class="form-radio-Other form-radio" name="T_id" id="other-23" <?php if (isset($purpose) && $purpose == "purpose") echo "checked"; ?> value="Others">
                        <label id="label-other-23" for="Other-23"></label>
                        <input type="text" class="form-radio-other-input form-textbox" name="q23_typeOf[other]" data-otherhint="Other" size="15" id="input_23" placeholder="Other">

                        <br>
                    </div>
                    ID Number: <br>
                    <input type="text" id="id" name="Id_no"> <br><br>
                    <small class="form-text text-muted"></small>
                    <br>
                    Phone Number <br>
                    <div class="form-group row">

                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="Zip">
                            <small class="form-text text-muted">Area Code</small>
                        </div>-
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="Phone">
                            <small class="form-text text-muted">Phone Number</small>

                        </div>
                    </div>
                </div>
            </div>
    <input type="submit" name="submit" value="submit" class="mx-auto d-block">
    </form>

</body>

</html>