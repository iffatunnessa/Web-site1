<?php
//  include ('includes/connectionDb.php');
$server = 'localhost';
$name = "root";
$password = "";
$dbName = "project";
$db = mysqli_connect($server, $name, $password, $dbName);

if  (isset($_GET['id'])){
    $id = mysqli_real_escape_string($db, $_GET['id']);

    $sql1 = "SELECT * FROM images WHERE ID='" . $id."'";
    $result = mysqli_query($db, $sql1);
    $imageData = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $imageData = $row["Image"];
    }
    header("content-type:image/jpg");
    echo $imageData;
}
else{
    echo "error!!!";
}
?>

