<?php
session_start();
$_SESSION['message']="";

$server = "localhost";
$name = "root";
$password = "";
$db = "project";
$conn = mysqli_connect($server,$name,$password,$db);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    //$file = $_POST['file'];
    $details = $_POST['details'];


    $INSERT = "INSERT INTO hill hotels (NAME , Caption)"
        . " VALUES ('".$name."','".$details."')";

    $result = mysqli_query($conn,$sql);

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/side-nav.css" />
    <title>Admin Panel</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 rounded">
            <div class="Home Page">
                <form method="POST" action="AdminPanel.php?=inserted" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Hotels for hills</label>
                        <input type="text" class='form-control' name="name" placeholder="write the name">

                    <!--    <input type="file" class="form-control-file" name="file" id="1"  aria-describedby="file-help">-->
                        <input type="text" class='form-control' name="details" placeholder="write...">
                        <button type="submit" class="btn btn-primary" name="submit">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>