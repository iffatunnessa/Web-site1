<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>

    <link rel="stylesheet" href="css/contact.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />

    <title>Contact Us</title>
</head>
<body>
    <div class="nav">
        <?php session_start(); include ('includes/header.php'); ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!---------------------------left floating form------------------------->
                <div class="left-box">
                    <div class="form-head">Send a message</div>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="form-group">
                                <label for="name" >Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name"/>
                            </div>
                            <div class="form-group">
                                <label for="email" >E-mail:</label>
                                <input type="email" class="form-control" name="email" placeholder="Eg:example@example.com"/>
                            </div>
                            <div class="form-group">
                                <label for="phone" >Phone(optional):</label>
                                <input type="text" class="form-control" name="phone" placeholder="Eg:+88000000"/>
                            </div>
                            <div class="form-group">
                                <label for="message" >Type a Message:</label>
                                <textarea class="form-control" name="message" placeholder="Write a message..."></textarea>
                            </div>

                        <div class="btnn">
                            <input class="btn btn-danger" type="submit" value="Send Message"/>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <!---------------------------right floating info------------------------>
                    <div class="contact-head">
                        CONTACT US
                    </div>
                    <div class="right-box">

                        <div class="address">
                            <i class="fas fa-address-book"></i>
                            <span class="glyphicon glyphicon-map-marker white" aria-hidden="true"></span> Address<br>
                            <p>445 Mount Eden Road, Mount Eden, Auckland.</p>
                        </div>
                        <div class="call">
                            <span class="glyphicon glyphicon-earphone white"></span> Let's Talk<br>
                            <p>+8800000000</p>
                        </div>
                        <div class="email">
                            <span class=" glyphicon glyphicon-envelope white"> </span> Send Us Email<br>
                            <p>aaaaaaa@aaaaa.com</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    $name = "";
    $email = "";
    $msg = "";
    $phone = "";
    $errormsg = "Invalid Input";
    $error = empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']);

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!$error){
            $name = validation($_POST['name']);
            $email = validation( $_POST['email']);
            $phone = validation($_POST['phone']);
            $msg = validation($_POST['message']);

        }
        else{
            echo 	"<div class = 'container'><div class='alert alert-danger' role='alert'>Some fields are invalid!</div></div>";
        }
    }

    function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(!$error) {
        $filename = "data.csv";
        $file = fopen($filename, "a");
        $row = count(file($filename))+1;
        $form_data = array(
            'SerialNo' => $row,
            'Name' => $name,
            'Email' => $email,
            'phone' => $phone,
            'Message' => $msg
        );
        fputcsv($file, $form_data);
    }
    ?>


    <div class="foot">
        <?php include ('includes/footer.php'); ?>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
 <!--   <script src="bootstrap/js/popper.min.js"></script>-->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>