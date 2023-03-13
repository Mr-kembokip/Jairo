<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>thanks</title>
</head>
<body>
<div class="container-fluid p-5 text-dark text-center">
<h1>Application Submitted!</h1>
<br>
<!-- <input type="submit" name="submit" value="Return To The Main Page" class="mx-auto d-block bg-primary border-0 rounded btn-lg"> -->
    </div>
</body>
</html>


<form action="login_form.php" method="post">
<div class="d-flex justify-content-center">
  <input type="submit" name="submit" value="Return To The Main Page" class="mx-2 bg-primary border-0 rounded">
</div>

</form> <br>
<form action="logout.php" method="post">
<div class="d-flex justify-content-center">
  <input type="submit" name="submit" value="Logout" class="mx-2 bg-primary border-0 rounded" onclick="logoutAndClose()">
</div>

</form>

