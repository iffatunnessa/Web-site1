<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/hills.css" />
    <link rel="stylesheet" href="css/side-nav.css" />
    <link rel="stylesheet" href="css/header.css" />

    <title>Hills</title>
</head>
<body>
<div class="nav">
        <?php session_start(); include ('includes/header.php'); ?>
    </div>
    <div class="banner">
        <img src="includes/images.php?id=6">
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="header">
                    <h1>Districts of Hills and Mountains</h1>
                </div>

                <?php

                    $server = "localhost";
                    $name = "root";
                    $password = "";
                    $db = "project";

                    $conn = mysqli_connect($server,$name,$password,$db);

                    $sql= "SELECT * FROM hills";
                    $result = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<figure class="figure">';
                        echo '<img src="includes/hills.php?id=' . $row['ID'] . '"';
                        echo 'class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">';
                        echo '<figcaption class="figure-caption"><br>';
                        echo "<h4>" . $row['PlaceName'] . "</h4>";
                        echo "<p>";
                        echo "<td>" . $row['Caption'] . "</td>";
                        echo "</p>";
                        echo '<br><br><a type="button" class="btn btn-outline-primary" href="Hotels.php?DistrictID='.$row['ID'].'">Hotels</a>';
                        echo ' <a type="button" class="btn btn-outline-secondary" href="Transportation.php?DistrictID='.$row['ID'].'">Transportation</a>';
                        echo ' <a type="button" class="btn btn-outline-info" href="Restaurants.php?DistrictID='.$row['ID'].'">Restaurants</a>';
                        echo ' <a type="button" class="btn btn-outline-danger" href="TouristAttraction.php?DistrictID='.$row['ID'].'">Tourist Attraction</a>';
                        echo ' <a type="button" class="btn btn-outline-success"href="map.php">Map</a>';
                        echo'</figcaption></figure>';
                    }

                ?>


            </div>
            <div class="col-md-2">
                <?php include ("includes/side-nav.php")?>
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