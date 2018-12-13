<div class="nav">
    <ul class="head-ul">
        <li class="head-li"> <a href="home.php">Home</a></li>
        <li class="head-li"> <a href="Contactpage.php">Contact</a></li>
        <li class="head-li"> <a href="Starting.php">About</a></li>
        <li class="head-li drop-down"> <a href="Login.php">Login</a>
            <div class="drop-down-content">
                <a href="Login.php">Login</a>
                <a href="Registration.php">Sign Up</a>
                <?php
                    if (isset($_SESSION['ID'])) {
                        echo '<form action = "Logout.php" method = "POST" > <button class="button" type = "submit" name="submit" >Log out</button></form >';
                }
                ?>


            </div>
        </li>
    </ul>


</div>