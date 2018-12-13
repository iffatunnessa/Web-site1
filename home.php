<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css.map" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />

    <title>Home</title>
</head>
<body>
    <div class="nav">
        <?php
    session_start(); include('includes/header.php'); ?>
    </div>
    <?php

    if(isset($_SESSION['ID']) && $_SESSION['message'] !=''){
       echo ' <div class="alert alert-info" role="alert">';
       echo $_SESSION['message'];
       echo '</div>';

    }

    ?>

    <!------------------------------- carousel slider -------------------------------->

    <div id="slider" class="carousel slide" data-ride="carousel">

        <!------- indicator -->
        <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
        </ol>

        <!------- wrapper ------>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="includes/images.php?id=4" alt="hill">
                <div class="carousel-caption">
                    <h3>Do you like hills?</h3>
                    <a class="btn btn-success" href="Hills.php" >Get Started</a>
                </div>
            </div>

            <div class="item">
                <img src="includes/images.php?id=5" alt="sea">
                <div class="carousel-caption">
                    <h3>Or seas?</h3>
                    <a class="btn btn-success" href="Seas.php">Get Started</a>
                </div>
            </div>
        </div>

        <!----- left and right controls with buttons---->


        <div class="left carousel-control" href="#slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </div>

        <div class="right carousel-control" href="#slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </div>
    </div>
    <!---------------------- details top places with figures ------------------->



    <?php include ('includes/footer.php'); ?>

    <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>
</html>