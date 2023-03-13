<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if (isset($_POST["submit"])) {

    $Ownership= '';
    if (isset($_POST["Ownership"])) {
        $Ownership = $_POST["Ownership"];
    }

    $M_status = '';
    if (isset($_POST["M_status"])) {
        $M_status = $_POST["M_status"];
    }

    $Wplace = '';
    if (isset($_POST["Wplace"])) {
        $Wplace = $_POST["Wplace"];
    }

    $Jtitle = '';
    if (isset($_POST["Jtitle"])) {
        $Jtitle = $_POST["Jtitle"];
    }

    $Waddress1 = '';
    if (isset($_POST["Waddress1"])) {
        $Waddress1 = $_POST["Waddress1"];
    }

    $Waddress2 = '';
    if (isset($_POST['Waddress2'])) {
        $Waddress2  = $_POST['Waddress2'];
    }

    $City = '';
    if (isset($_POST["City"])) {
        $City = $_POST["City"];
    }

    $Province = '';
    if (isset($_POST["Province"])) {
        $Province = $_POST["Province"];
    }

    $Year = '';
    if (isset($_POST["Year"])) {
        $Year = $_POST["Year"];
    }

    $Month = '';
    if (isset($_POST["Month"])) {
        $Month = $_POST["Month"];
    }


    // Insert the data into the database
    $sql = "INSERT INTO  tb_pdetails (Ownership, M_status, Wplace, Jtitle, Waddress1, Waddress2, City, Province, Year, Month)
    VALUES ('$Ownership','$M_status', '$Wplace', '$Jtitle', '$Waddress1', '$Waddress2','$City','$Province', '$Year', '$Month')";

    if (mysqli_query($conn, $sql)) {
        // success
        echo "<script> alert('Details saved Successful') ;</script>";
        header("location:financial.php");
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
    <title>Property Ownship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</head>

<body>
    <form method="post">
        <div class="container bg-info" style="max-width: 900px;">
            <div class="container form-span">
                <span>

                    <hr size="4" color="danger" width="100%" class="bg-primary">
                    <h5> Property Ownship</h5>
                    <hr size="4" color="danger" width="100%" class="bg-white">
                </span>
                <div class="row">
                    <!-- <div class="col-md-12 text-center rounded mt-4 mb-4"> -->
                    <div class="col-md-12 mb-12">

                        <div class="ownership pl-4">
                            <input type="radio" name="Ownership" <?php if (isset($Ownship) && $Ownship == "Owned") echo "checked"; ?> value=" Owned"> Owned <br>
                            <input type="radio" name="Ownership" <?php if (isset($Ownship) && $Ownship == "Rent") echo "checked"; ?> value=" Rent"> Rent <br>
                        </div>
                        <br>
                        <h6>Marital Status:</h6>

                        <div class="status pl-4">
                            <input type="radio" name="M_status" <?php if (isset($Mstatus) && $Mstatus == "Sinlge") echo "checked"; ?> value="single"> Single <br>
                            <input type="radio" name="M_status" <?php if (isset($Mstatus) && $Mstatus == "Maried") echo "checked"; ?> value="maried"> Married <br>
                            <input type="radio" name="M_status" <?php if (isset($Mstatus) && $Mstatus == "Widowed") echo "checked"; ?> value="widowed"> Widowed <br>
                            <input type="radio" name="M_status" <?php if (isset($Mstatus) && $Mstatus == "Divorced") echo "checked"; ?> value="divorced"> Divorced <br>
                        </div>
                        <br>
                        <h6>Place of Work: </h6>
                        <input type="text" class="form-control" name="Wplace">
                        <small class="form-text text-muted">work place</small>
                        <br>
                        <h6>Job Title: </h6>
                        <input type="text" class="form-control" name="Jtitle">
                        <small class="form-text text-muted">job title</small>

                        <br>

                        <label for="home address">Work Address:</label><br>
                        <div class="form-group">
                            <input type="text" class="id" name="Waddress1"><br>
                            <small class="form-text text-muted">Streat Address</small><br>

                            <input type="text" class="id" name="Waddress2"><br>
                            <small class="form-text text-muted"> Street Address 2</small>
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

                            <br>
                            Years of Employment: <br>
                            <input type="text" class="id" placeholder="ex:23" name="Year"><br>
                            <small class="form-text text-muted"></small><br>
                            Monthly Net Income: <br>
                            <input type="text" class="id" placeholder="ex:23" name="Month"><br>
                            <small class="form-text text-muted">in USD</small>


                            <input type="submit" name="submit" value="submit" class="mx-auto d-block">

                        </div>
                    </div>
                </div>
            </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>