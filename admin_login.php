<?php
include 'conn.php';
session_start();
if (isset($_SESSION['admin_username'])) {
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-6 offset-3 jumbotron text-center">

<h1>You are already logged in as <?php echo $name; ?>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php
}

else {
include 'conn.php';
include 'header.php';
$error = "";
    

if (isset($_POST['submit'])) {
    
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = mysqli_escape_string($db, $_POST['password']);

    $query = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '" . $username . "' AND admin_password = md5('" . $password . "')"); 
    $sql = "SELECT * FROM admin WHERE admin_username = '$username'";
    $result = mysqli_query($db, $sql);                                                   
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($query)) {
        $_SESSION['admin_username'] = $username;
        $_SESSION['id'] = $row['admin_id'];
        header("Location: admin_index.php");
    } else {
        $error .= "<h1>Username or password are incorrect</h1>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body style="background-color:#B0C4DE">
    <div class="container">
        <div class="col-6 offset-3 jumbotron text-center">
            <?php
if ($error != "") {
    echo $error;
}
?>
            <form method="POST" action="admin_login.php">
                <!-- Input pentru username -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <!-- Input pentru parola -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control"  type="password" name="password" id="password">
                </div>
                <!-- Buton de submit -->
                <input class="btn btn-primary" type="submit" name="submit" value="Login"><br />
                <p>If you do not have an account, you can <a href="signup.php">Sign Up!</a></p>        
                
                
            </form>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
?>
<?php 
    include 'footer.php';
    ?>

