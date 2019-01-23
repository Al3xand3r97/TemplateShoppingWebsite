<?php
include 'conn.php';
session_start();
$query = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '" . $_SESSION['admin_username'] . "'");
$row = mysqli_fetch_array($query, MYSQLI_BOTH);
$user = $row['admin_username'];
if($user == 'root') {
    include 'owner_header.php';
?>
<body style="background-color:#B0C4DE">
    <div class="container">
        <div class="col-12 jumbotron">
            <h1 class="text-center">Add Products</h1>
            <span class="col-12 badge badge-success" style="display:none;" id="verde"> </span>
            <br />
            <form method="POST" action = "owner_add.php">
                Name: <input type="text" class="form-control" id="name" name="name"> <br />
                Price: <input type="text" class="form-control" id="price" name="price"> <br />
                Type: <input type="text" class="form-control" id="type" name="type"> <br />
            
                <br />
                <button class="btn btn-success">Add</button>
            </form>

        </div>


    </div>
    </body>
   </html>
   <?php 
} else {

    header("Location:index.php");
}
include 'footer.php';
?>
