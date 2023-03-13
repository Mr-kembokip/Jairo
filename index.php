<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if (isset($_POST["submit"])) {

    $Title = '';
    if (isset($_POST["Title"])) {
        $Title = $_POST["Title"];
    }

    $Fname = '';
    if (isset($_POST["Fname"])) {
        $Fname = $_POST["Fname"];
    } 

    $Lname = '';
    if (isset($_POST["Lname"])) {
        $Lname = $_POST["Lname"];
    }

    $Gender = '';
    if (isset($_POST["Gender"])) {
        $Gender = $_POST["Gender"];
    }

    $Birth = '';
    if (isset($_POST['Birth'])) {
        $Birth = $_POST['Birth'];
    }

    $Zip = '';
    if (isset($_POST["Zip"])) {
        $Zip = $_POST["Zip"];
    }

    $Phone = '';
    if (isset($_POST["Phone"])) {
        $Phone = $_POST["Phone"];

        if (!empty($phone) && is_numeric($phone)) {
            if (strlen($phone) == 9) {
                //   $sql = "INSERT INTO tb_details (Phone) VALUES ('$phone')";

                if (mysqli_query($conn, $sql)) {
                    // Query was successful
                    echo " ";
                } else {
                    // Query failed
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error: Phone number must be exactly 10 digits.";
            }
        } else {
            echo "Error: Phone number is required and must be a valid number.";
        }
    }

    $ID_No = '';
    if (isset($_POST["ID_No"])) {
        $ID_No = $_POST["ID_No"];
    }

    $Email = '';
    if (isset($_POST["Email"])) {
        $Email = $_POST["Email"];
    }

    $Address1 = '';
    if (isset($_POST["Address1"])) {
        $Address1 = $_POST["Address1"];
    }

    $Address2 = '';
    if (isset($_POST["Address2"])) {
        $Address2 = $_POST["Address2"];
    }

    $City = '';
    if (isset($_POST["City"])) {
        $City = $_POST["City"];
    }

    $Province = '';
    if (isset($_POST["Province"])) {
        $Province = $_POST["Province"];
    }

    $Postal = '';
    if (isset($_POST["Postal"])) {
        $Postal = $_POST["Postal"];
    }




    // Insert the data into the database
    $sql = "INSERT INTO tb_details (Title, Fname, Lname, Gender, Birth, Zip, Phone, ID_No, Email, Address1, Address2, City, Province, Postal)
    VALUES ('$Title', '$Fname', '$Lname', '$Gender', '$Birth', '$Zip','$Phone', '$ID_No', '$Email', '$Address1', '$Address2','$City','$Province', '$Postal')";

    if (mysqli_query($conn, $sql)) {
        // success
        echo "<script> alert('Details saved Successful') ;</script>";
        header("location:ownership.php");
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
    <title>Data entry form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>

<body>

    <div class="d-flex align-items-center h-100">
        <img src="images/bank.png" alt="Centered Image" class="mx-auto">
    </div>
    <form method="post">
        <div class="container bg-info" style="max-width: 900px;">
            <div class="container form-span">
                <span>
                    <h3>Personal Loan Application Form</h3>
                    <hr size="4" color="danger" width="100%" class="bg-white">
                    <hr size="4" color="danger" width="100%" class="bg-white">
                    <h4>Applicant Personal Details</h4>
                    <hr size="4" color="danger" width="100%" class="bg-white">
                </span>
                <div class="row">
                    <!-- <div class="col-md-12 text-center rounded mt-4 mb-4"> -->
                    <div class="col-md-12 mb-12">

                        Name: <br>

                        <select name="Title">
                            <option value="mr">Mr.</option>
                            <option value="mrs">Mrs.</option>
                            <option value="miss">Miss</option>
                        </select>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Fname">
                                <small class="form-text text-muted">First Name</small>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="Lname">
                                <small class="form-text text-muted">Last Name</small>

                            </div>
                        </div>
                        <br>
                        Gender:
                        <div class="Gender pl-4">
                            <input type="radio" name="Gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female"> Female <br>
                            <input type="radio" name="Gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male"> Male <br>
                            <input type="radio" name="Gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other"> Other <br>
                        </div>
                        <br>
                        Birth Date: <br>
                        <input type="date" id="date" name="Birth"> <br>           
                        <small class="form-text text-muted">Date</small><br><br>

                        Phone Number: <br>
                        <div class="form-group row">

                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="Zip">
                                <small class="form-text text-muted">Zip Code</small>
                            </div>-
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="Phone">
                                <small class="form-text text-muted">Phone Number</small>

                            </div>
                        </div>
                        <br>


                        Type of ID: <br>
                        <div class="ID pl-4">
                            <input type="radio" name="ID_No" <?php if (isset($Id) && $Id == "Passport") echo "checked"; ?> value="Passport"> Passport <br>
                            <input type="radio" name="ID_No" <?php if (isset($Id) && $Id  == "Driver Licence") echo "checked"; ?> value="Driver Licence"> Driver Licence <br>
                            <input type="radio" name="ID_No" <?php if (isset($Id) && $Id  == "Voter ID") echo "checked"; ?> value="Voter ID"> Voter ID<br>
                            <input type="radio" name="ID_No" <?php if (isset($Id) && $Id  == "Social Security Number") echo "checked"; ?> value="Social Security Number"> Social Security Number<br>
                            <input type="radio" name="ID_No" <?php if (isset($Id) && $Id  == "Others") echo "checked"; ?> Others>

                            <br>
                        </div>
                        ID Number: <br>
                        <input type="text" id="id" name="ID_No"> <br><br>
                        <small class="form-text text-muted"></small>


                        Email: <br>
                        <input type="email" name="Email"> <br>
                        <small class="form-text text-muted">examle@gmail.com</small><br><br>

                        <label for="home address">Home Address:</label><br>
                        <div class="form-group">

                            <input type="text" class="id" name="Address1"><br>
                            <small class="form-text text-muted">Street Address</small><br>

                            <input type="text" class="id" name="Address2"><br>
                            <small class="form-text text-muted">Street Address2</small><br>

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
                                <input type="text" class="form-control" name="Postal">
                                <small class="form-text text-muted"> Postal/Zip Code</small>
                            </div>
                            <br>


                        </div>
                    </div>
                </div>

            </div>




            <!-- <button class="button bg-primary rounded border-primary text-white px-4 p-1" name="submit" type="submit" id="form-submit"> -->
            <input type="submit" name="submit" value="submit" class="mx-auto d-block">
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <a href="registration.php"></a> -->
</body>

</html>