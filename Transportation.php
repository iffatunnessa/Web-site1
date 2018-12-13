<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tripaura-Tranposrtation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/transport.css" />
    <link rel="stylesheet" href="css/side-nav.css" />
    <link rel="stylesheet" href="css/header.css" />

</head>
<body>

    <div class="nav">
        <?php
        session_start(); include ("includes/header.php"); ?>
    </div>
    <div class="banner"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="header"><h1>Tranporattion</h1></div>

                <?php

                $server = "localhost";
                $name = "root";
                $password = "";
                $db = "project";

                $conn = mysqli_connect($server,$name,$password,$db);

                //$sql= "SELECT * FROM hotels";
                if(isset($_SESSION['ID'])){
                if (isset($_GET['DistrictID'])) {
                    $DistrictID = mysqli_real_escape_string($conn, $_GET['DistrictID']);
                    $sql = "SELECT * FROM transportation WHERE DistrictID ='" . $DistrictID ."'";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo   '<h2>'.$row['Name'].'</h2><br>';
                        echo   $row['Details'] ;

                    }
                }
                else{
                    $sql1 = "SELECT * FROM transportation";
                    $result1 = mysqli_query($conn,$sql1);
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo   '<h2>'.$row1['Name'].'</h2><br>';
                        echo   $row1['Details'] ;

                    }
                }}
                else{
                    echo ' <div class="alert alert-info" role="alert">Please Login</div> ';
                    echo '<a href="Login.php" class="btn btn-outline-danger">Login</a><br> Or go back   ';
                    echo '<a href="Home.php" class="btn btn-outline-link">Go Back</a>';

                }

                ?>

            </div>

            <div class="col-md-2"><?php include ("includes/side-nav.php"); ?></div>
        </div>

    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>