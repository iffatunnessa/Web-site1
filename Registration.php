<?php
session_start();
$_SESSION['message']="";

$server = "localhost";
$name = "root";
$password = "";
$db = "project";
$conn = mysqli_connect($server,$name,$password,$db);

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //password, re-password matching
    if ($_POST['password'] == $_POST['re-password']) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['optradio'];
        $password = md5($_POST['password']);

        $SELECT = "SELECT * FROM registration WHERE Email = ? Limit 1";
        $INSERT = "INSERT INTO registration (FirstName, LastName, Email, Password, Gender)"
            . " VALUES (?,?,?,?,?)";

        //prepare statement
        $slt = $conn->prepare($SELECT);
        $slt->bind_param("s",$email );
        $slt->execute();
        $slt->bind_result($email);
        $slt->store_result();
        $row = $slt->num_rows;
        if($row == 0) {
            $slt->close();
            $slt = $conn->prepare($INSERT);
            $slt->bind_param("sssss", $firstname, $lastname, $email, $password, $gender);
            $slt->execute();

            $_SESSION['message'] = "Registration successful";
            header('location:home.php');
        }
        else{
            $_SESSION['message'] = "Someone has been used this email";

        }

    } else {
        $_SESSION['message'] = "Passwords are not Matched!!!";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/registration.css" />
    <link rel="stylesheet" href="css/header.css" />

</head>
<body>
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


    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 form">
                <form action="Registration.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="radio">
                        <label class="radio-inline"><input type="radio" name="optradio" value="m">Male</label>
                        <label class="radio-inline"><input type="radio" name="optradio" value="f">Female</label>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="********" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Retype Password:</label>
                        <input type="password" class="form-control" name="re-password" placeholder="********" required>
                    </div>
                   <div class="checkbox">
                        <label><input type="checkbox" name="check" required>I'm sure I want to create an account</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Sign Up" >
                </form>



            </div>
            <div class="col-md-3 div-account">CREATE AN ACCOUNT</div>
        </div>
    </div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>