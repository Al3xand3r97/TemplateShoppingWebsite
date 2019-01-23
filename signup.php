<?php
include 'header.php';

if(isset($_POST['signup'])) {

    include 'conn.php';

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$name = mysqli_real_escape_string($db, $_POST['name']);

    


        $sql = "SELECT * FROM admin WHERE admin_username = '$username'";
        $result = mysqli_query($db , $sql);
        $resultCheck = mysqli_num_rows($result);
    if($resultCheck >0) {
        header("Location: signup.php?signup=otherusername");
        exit();
    } 
    
    else {
        $query = mysqli_query($db, "INSERT INTO admin (admin_username, admin_password, admin_name) VALUES ('$username', md5('$password'), '$name')");    

        $sql2 = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_name = '$name'";
        $result2 = mysqli_query($db, $sql2);

        if(mysqli_num_rows($result2) > 0 ) {
            while($row = mysqli_fetch_assoc($result2)) {
                $userid = $row['admin_id'];
                $sql3 = "INSERT INTO profileimg (userid, status) VALUES ('$userid', 1)";
                mysqli_query($db, $sql3);
            }
        }
        header("Location: signup.php?signup=success");
        exit();
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-6 offset-3 jumbotron text-center">
        
        <h1 class="text-center">Sign up</h1><br />


        <?php

			$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if(strpos($fullUrl, "signup=otherusername") == true) {
				echo "<p><h1 style='color:red'><strong>The username is taken!</strong></h1></p>";
				exit();
            } 
            elseif(strpos($fullUrl, "signup=success") == true) {
				echo "<p class = 'success'>You have successfully signed up!</p>
				<br>
				<a href = 'admin_login.php'><button class='btn-primary'><i class='fas fa-sign-in-alt'></i> Go to Login</button>
				";
				exit();
			}
            

        ?>


            <form method="POST" action="signup.php">
            <input type="text" name="username" placeholder="Username" required><br /><br />
			<input type="password" name="password" placeholder="Password" required><br /><br />
			<input type="text" name="name" placeholder="Name" required><br /><br />
			<button type="submit" name="signup"><i class="fas fa-user-plus"></i> Sign Up</button>      
                
                
            </form>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>