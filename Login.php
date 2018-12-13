<?php
session_start();
$_SESSION['message']="";

$server = "localhost";
$name = "root";
$password = "";
$db = "project";
$conn = mysqli_connect($server,$name,$password,$db);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM registration WHERE Email ='".$email."' AND Password = '".$password."'";

    $result = mysqli_query($conn,$sql);

    if($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['ID'] = $row['ID'];
        $_SESSION['FirstName'] = $row['FirstName'];
        $_SESSION['LastName'] = $row['LastName'];
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['Gender'] = $row['Gender'];

        $_SESSION['message'] = "You are successfully logged in";
        header('location: Home.php?login=success');

    }
    else{
        $_SESSION['message'] = "Invalid email or password! Try Again!";
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
    <link rel="stylesheet" href="css/Login.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />

</head>
<body>
    <!-- navigation from php header -->
    <div class="nav">
        <?php include ('includes/header.php'); ?>
    </div>

    <?php
    if($_SESSION['message']!=""){
        echo ' <div class="alert alert-danger" role="alert">';
        echo $_SESSION['message'];
        echo '</div>';
    }
    ?>
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <div class="form">
                    <form action="Login.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="**********" required>
                        </div>
                        <input type="submit" class="btn btn-danger" value="Log In">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="foot">
       <?php //include ('includes/footer.php'); ?>
    </div>-->



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>