<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/tourist.css" />
    <link rel="stylesheet" href="css/side-nav.css" />
    <link rel="stylesheet" href="css/header.css" />

    <title>Tripaura-Tourist Attraction</title>
</head>
<body>

<div class="nav">
    <?php session_start(); include ('includes/header.php'); ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php
            $server = "localhost";
            $name = "root";
            $password = "";
            $db = "project";

            $conn = mysqli_connect($server,$name,$password,$db);
            if(isset($_SESSION['ID'])) {
                if (isset($_GET['DistrictID'])) {
                    $DistrictID = mysqli_real_escape_string($conn, $_GET['DistrictID']);
                    $sql = "(SELECT * FROM tourist WHERE DistrictID ='" . $DistrictID . "') UNION (SELECT * FROM hilltourist WHERE DistrictID ='" . $DistrictID . "')";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<figure class="figure">';
                        echo '<img src="includes/hilltourist.php?id=' . $row['ID'] . '"';
                        echo 'class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">';
                        echo '<figcaption class="figure-caption"><br>';
                        echo "<h4>" . $row['Name'] . "</h4>";
                        echo "<p>";
                        echo "<td>" . $row['Details'] . "</td>";
                        echo "</p>";
                        echo '</figcaption></figure>';
                    }
                }
                else{
                    $sql = "SELECT * FROM tourist union SELECT  * from hilltourist";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<figure class="figure">';
                        echo '<img src="includes/hilltourist.php?id=' . $row['ID'] . '"';
                        echo 'class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">';
                        echo '<figcaption class="figure-caption"><br>';
                        echo "<h4>" . $row['Name'] . "</h4>";
                        echo "<p>";
                        echo "<td>" . $row['Details'] . "</td>";
                        echo "</p>";
                        echo '</figcaption></figure>';
                    }
                }
            }

            else{
                echo ' <div class="alert alert-info" role="alert">Please Login</div> ';
                echo '<a href="Login.php" class="btn btn-outline-danger">Login</a><br> Or go back   ';
                echo '<a href="Home.php" class="btn btn-outline-link">Go Back</a>';

            }


            ?>
        </div>

        <div class="col-md-2">
             <?php include ("includes/side-nav.php")?>
        </div>
    </div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>