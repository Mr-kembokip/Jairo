<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if (isset($_POST["submit"])) {
    $Sign = isset($_POST["Sign"]);
    $G_sign = isset($_POST["G_sign"]);

    // Insert the data into the database
    $sql = "INSERT INTO tb_sign (Sign,G_sign) 
  VALUES ('{$_POST["Sign"]}','{$_POST["G_sign"]}')";


// Check if the form is submitted
    if (isset($_SESSION['username'])){
        // success
        echo "<script> alert('ThankYou Your Submition Has Been Received') ;</script>";

        header("location:end.php");

    } else {
        // error

            // Redirect the user to register page
            header("Location: login_form.php");
            exit();
        // echo "<script> alert('Registration Fail Try Again') ;</script>";
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

    <title>signature</title>
</head>

<body>
    <form method="post">
        <div class="container bg-info" style="max-width: 900px; padding:20px">
            <div class="container form-span">

                <hr size="4" color="danger" width="100%" class="bg-white">
                <h5>Signatures</h5>
                <hr size="4" color="danger" width="100%" class="bg-white">
                <p>Everything that I have stated in this application is correct to the best of my knowledge. I understand that you will retain this application whether or not loan is approved. You are authorized to check my
                    credit and employment history and to answer questions about your credit experience with me.</p>

                <div class="d-flex ">

                    <div class="p-2">
                        <label for="myTextarea">Applicant's Signature</label><br>
                        <textarea name="Sign" id="Sign" rows="5" cols="30"></textarea>
                    </div>

                    <div class="p-2">
                        <label for="myTextarea">Guarantor's Signature</label><br>
                        <textarea name="G_sign" id="G_sign" rows="5" cols="30"></textarea>

                    </div>
                </div>


                
                <input type="submit" name="submit" value="submit" class="mx-auto d-block">
            </div>
        </div>
    </form>
    <br>
</body>

</html>