<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotels</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/hotels.css" />
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
                <div class="header"><h1>Hotels</h1></div>

                <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>Hotel Name</th>
                        <th>Persons</th>
                        <th>District</th>
                        <th>Price</th>
                        <th>Website/Facebook Page</th>
                    </tr>
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
                    $sql = "(SELECT * FROM seahotels WHERE DistrictID ='" . $DistrictID . "') UNION (SELECT * FROM hillhotels WHERE DistrictID ='" . $DistrictID . "')";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['Hotel Name'] . "</td>";
                        echo "<td>" . $row['Persons'] . "</td>";
                        echo "<td>" . $row['District'] . "</td>";
                        echo "<td> BDT " . $row['Price'] . "</td>";
                        echo "<td> <a href='" . $row['Website'] . "'>Site</a></td>";
                        echo "</tr>";
                    }
                }
                else{
                    $sql = "SELECT * FROM hillhotels union SELECT * FROM  seahotels";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['Hotel Name'] . "</td>";
                        echo "<td>" . $row['Persons'] . "</td>";
                        echo "<td>" . $row['District'] . "</td>";
                        echo "<td> BDT " . $row['Price'] . "</td>";
                        echo "<td> <a href='" . $row['Website'] . "'>Facebook</a></td>";
                        echo "</tr>";
                    }
                }
                }
                else{
                    if (isset($_GET['DistrictID'])) {
                        $DistrictID = mysqli_real_escape_string($conn, $_GET['DistrictID']);
                        $sql = "(SELECT * FROM seahotels WHERE DistrictID ='" . $DistrictID . "' AND Status = 0) UNION (SELECT * FROM hillhotels WHERE DistrictID ='" . $DistrictID . "' AND Status = 0)";
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['Hotel Name'] . "</td>";
                            echo "<td>" . $row['Persons'] . "</td>";
                            echo "<td>" . $row['District'] . "</td>";
                            echo "<td> BDT " . $row['Price'] . "</td>";
                            echo "<td> <a href='" . $row['Website'] . "'>Site</a></td>";
                            echo "</tr>";
                        }
                    }
                    else{
                        $sql = "(SELECT * FROM hillhotels WHERE Status = 0) union (SELECT * FROM  seahotels WHERE Status = 0)";
                        $result = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['Hotel Name'] . "</td>";
                            echo "<td>" . $row['Persons'] . "</td>";
                            echo "<td>" . $row['District'] . "</td>";
                            echo "<td> BDT " . $row['Price'] . "</td>";
                            echo "<td> <a href='" . $row['Website'] . "'>Facebook</a></td>";
                            echo "</tr>";
                        }
                    }
                }

                ?>

                </table>




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