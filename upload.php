<?php
include 'conn.php';
session_start();
$query = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '" . $_SESSION['admin_username'] . "'");
$row = mysqli_fetch_array($query, MYSQLI_BOTH);
$id = $row['admin_id'];

if(isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
            if($fileSize < 500000) {
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;    
                foreach(glob("uploads/profile{$id}.*") as $match) { unlink($match); }         
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE profileimg SET status=0 WHERE userid = '$id'";
                $result = mysqli_query($db, $sql);

                header("Location: profile.php?uploadsuccess");
            } else {
                header( "refresh:0;url=profile.php" );
                echo '
                <script>
                
                    alert("File is too big!");

                </script>
                ';

                
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        header( "refresh:0;url=profile.php" );
                echo '
                <script>
                
                    alert("Please use only JPG, JPEG, PNG and GIF formats!");

                </script>
                ';
    }
}
?>