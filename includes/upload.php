<html>
<head></head>
<body>
<?php
$server = "localhost";
$name = "root";
$password = "";
$db = "project";

$conn = mysqli_connect($server,$name,$password,$db);
$SQL= mysqli_query($conn,"SELECT * FROM images Where ID='".$_GET['id']."'");
$row=mysqli_fetch_assoc($SQL);
$oldFile="";
if(isset($_POST['update'])) {
        $id = $_GET['id'];
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileTemp = $_FILES['file']['tmp_name'];
        $path = "image/".$fileName;

        $updateSQL = "UPDATE images SET Image ='$file 'WHERE ID =" . $_GET['id'];
        $update = mysqli_query($conn, $updateSQL);
}


?>
</body>
</html>
