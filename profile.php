<?php
include 'conn.php';
session_start();
$query = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '" . $_SESSION['admin_username'] . "'");
$row = mysqli_fetch_array($query, MYSQLI_BOTH);
$user = $row['admin_username'];
$name = $row['admin_name'];
$id = $row['admin_id'];
if($id == '1') {
    include 'owner_header.php';
} else {
    include 'admin_header.php';
}
?>
<head>
<style>
img {
max-width: 200px;
max-height:300px;
}
</style>


</head>
<body style="background-color:#B0C4DE">
<div class="container">
    <div class="main-wrapper">
            <div class="jumbotron">
                <div class="float-left">
    <h2>Welcome, <?php echo $name; ?>!</h2>
                </div><br><br>
        <?php
        $query = mysqli_query($db, "SELECT * from admin");
        if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
                $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
                $resultImg = mysqli_query($db, $sqlImg);
                $rowImg = mysqli_fetch_assoc($resultImg);
                    echo "<div>";
                    
                    if($rowImg['status'] == 0) {
                        $filename = "uploads/profile".$id."*";
                        $fileinfo = glob($filename);
                        $fileext = explode(".", $fileinfo[0]);
                        $fileactualext = $fileext[1];


                        echo "
                        <p>
                        
                        <img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."'>

                        </p>
                        ";
                    } else {
                        echo "
                        <p>
                        
                        <img src='uploads/profiledefault.jpg'>
                        
                        </p>
                        ";
                    }
                    
                    echo "</div>";
                
            }
    ?>
<form action="upload.php" method = "POST" enctype = "multipart/form-data">
                        <input type="file" name = "file"><br>
                        <button type="submit" name = "submit" style="margin-top:5px">Upload</button>
                        </form>

            
        </div>
    </div>
</div>
</body>
<?php
    include 'footer.php';
    ?>