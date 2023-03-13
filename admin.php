
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   <title>Admin Page</title>
</head>
<body style="background-color:powderblue; padding: 15px; margin: 15px;">
   

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(isset($_SESSION["user_name"])) {
// echo $_SESSION["user_name"];
echo '<p style="font-size: 30px;" <span>welcome </span>' 
. $_SESSION["user_name"] . '</p>';

$logedInUser = $_SESSION["user_type"];

if($logedInUser== "admin"){


// Connect to the database
$conn = mysqli_connect("localhost","root", "Trymenot#123$", "user");

// Select data from the joint tables
$sql = "SELECT *FROM tb_details";

$result = mysqli_query($conn, $sql);
// Display the data in a table
echo "<table>";
echo "<tr><th>ID</th> <th>Title</th> <th>First Name</th> <th>Last Name</th> <th>Gender</th> <th>Birth</th> <th>Zip</th> <th>Phone</th> <th>ID No</th> <th>Email</th> <th>Address1</th> <th>Address2</th> <th>City</th> <th>Province</th> <th>Postal</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Title"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Birth"] . "</td> <td>" . $row["Zip"] . "</td><td>" . $row["Phone"] . "</td><td>" . $row["ID_No"] . "</td><td>" . $row["Email"] . "</td> <td>" . $row["Address1"] . "</td><td>" . $row["Address2"] . "</td><td>" . $row["City"] . "</td><td>" . $row["Province"] . "</td><td>" . $row["Postal"] . "</td></tr>";
   
}
echo "</table>";

$sql = "SELECT *FROM tb_pdetails";

$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th> <th>Ownership</th> <th>M_status</th> <th>Wplace</th> <th>Jtitle</th> <th>Waddress1</th> <th>Waddress12</th> <th>City</th> <th>Province</th> <th>Year</th> <th>Month</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row["id"] . "</td> <td>" . $row["Ownership"] . "</td> <td>" . $row["M_status"] . "</td> <td>" . $row["Wplace"] . "</td> <td>" . $row["Jtitle"] . "</td> <td>" . $row["Waddress1"] . "</td> <td>" . $row["Waddress2"] . "</td> <td>" . $row["City"] . "</td> <td>" . $row["Province"] . "</td><td>" . $row["Year"] . "</td><td>" . $row["Month"] . "</td></tr>";
   }
echo "</table>";

$sql = "SELECT *FROM tb_financial";

$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th> <th>Bank Name</th> <th>Branch Name</th> <th>Account Number<th> <th>Account type</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Bank"] . "</td><td>" . $row["Branch"] . "</td><td>" . $row["Account"] . "</td><td>" . $row["Atype"] . "</td><br></tr>";
   }
echo "</table>";

$sql = "SELECT *FROM tb_loan";

$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th> <th>Ldetails</th> <th>Lamount</th> <th>Terms In Months</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Ldetails"] . "</td><td>" . $row["Lamount"] . "</td><td>" . $row["Terms"] . "</td></tr>";
   }
echo "</table>";

$sql = "SELECT *FROM tb_liabilities";

$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th> <th>Creditor</th> <th>Liability</th> <th>Monthly payment</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row["id"] . "</td> <td>" . $row["Creditor"] . "</td>  <td>" . $row["Liability"] . "</td> <td>" . $row["Mpayment"] . "</td><br></tr>";
   }
echo "</table>";

$sql = "SELECT *FROM tb_guarantor";

$result = mysqli_query($conn, $sql);
// Display the data in a table
echo "<table>";
echo "<tr><th>ID</th> <th>First Name</th> <th>Last Name</th> <th>Relationship</th> <th>J_title</th> <th>Work Address</th> <th>Work Address2</th> <th>City</th> <th>Province</th> <th>Postal</th> <th>Zip_Code</th> <th>Monthly Income</th><th>Type of Id</th> <th>Zip</th> <th>Phone</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row["id"] . "</td> <td>" . $row["F_name"] . "</td> <td>" . $row["L_name"] . "</td> <td>" . $row["Relative"] . "</td><td>" . $row["J_title"] . "</td> <td>" . $row["W_address"] . "</td> <td>" . $row["W_address2"] . "</td> <td>" . $row["City"] . "</td><td>" . $row["Province"] . "</td> <td>" . $row["Zip_code"] . "</td><td>" . $row["M_income"] . "</td><td>" . $row["T_id"] . "</td><td>" . $row["Id_no"] . "</td> <td>" . $row["Zip"] . "</td><td>" . $row["Phone"] . "</td> <br></tr>";
   
}
echo "</table>";


$sql = "SELECT *FROM tb_sign";

$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th> <th>Applicant sign</th> <th>Guarontor Sign</th> </tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row["id"] . "</td> <td>" . $row["Sign"] . "</td>  <td>" . $row["G_sign"] . "</td> <br></tr>";
   }
echo "</table>";

}
else{
    echo "you are not admin";
}
}
?>

</body>
</html>