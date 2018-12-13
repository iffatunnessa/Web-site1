<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restaurants</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/restaurants.css" />
    <link rel="stylesheet" href="css/side-nav2.css" />
    <link rel="stylesheet" href="css/header.css" />
<body>
    <div class="banner"></div>
    <?php
            session_start();
            include ("includes/header.php");?>
    <div class="container">
        <div class=" nav">
            <?php
            include ("includes/side-nav.php"); ?></div>
        <div class="container header"><h1>Restaurants</h1></div>

        <div class="row">

            <?php

                $server = "localhost";
                $name = "root";
                $password = "";
                $db = "project";

                $conn = mysqli_connect($server,$name,$password,$db);

                //$sql= "SELECT * FROM hotels";

            if(isset($_SESSION['ID'])) {
                if (isset($_GET['DistrictID'])) {
                    $DistrictID = mysqli_real_escape_string($conn, $_GET['DistrictID']);
                    $sql = "(SELECT * FROM seafoods WHERE DistrictID ='" . $DistrictID . "') UNION (SELECT * FROM hillfoods WHERE DistrictID ='" . $DistrictID . "')";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo " <div class=\"col-md-3\">";
                        echo "<div class=\"card\" style=\"width: 18rem;\">";
                        echo "<img class='card-img-top' src='includes/seafood.php?id=". $row['ID'] . "' alt='Card image cap'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>".$row['Name']."</h5>";
                        echo "<p class='card-text'>".$row['Location']."</p>";
                        echo "<a href='".$row['Facebook']. "'class='btn btn-primary'>Facebook</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                    }
                }
                else{
                    $sql = "SELECT * FROM hillfoods union SELECT * FROM  seafoods";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo " <div class=\"col-md-3\">";
                        echo "<div class=\"card\" style=\"width: 18rem;\">";
                        echo "<img class='card-img-top' src='includes/seafood.php?id=". $row['ID'] . "' alt='Card image cap'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>".$row['Name']."</h5>";
                        echo "<p class='card-text'>".$row['Location']."</p>";
                        echo "<a href='".$row['Facebook']. "'class='btn btn-primary'>Facebook</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }}
                else {
                    echo ' <div class="alert alert-info" role="alert">Please Login</div> <br> ';
                    echo '<a href="Login.php" class="btn btn-outline-danger">Login</a><br> Or go back ';
                    echo '<a href="Home.php" class="btn btn-outline-link">Go Back</a>';
                }


                ?>


        </div>

    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>