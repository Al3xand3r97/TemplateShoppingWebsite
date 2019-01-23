<?php
    include 'conn.php';
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <title>Homepage Firma</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fa/css/all.css">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
</head>
        <nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <?php
if(isset($_SESSION['admin_username'])){
    $query = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '" . $_SESSION['admin_username'] . "'");
    $row = mysqli_fetch_array($query, MYSQLI_BOTH);
    $name = $row['admin_name'];

    echo "<a class='navbar-brand' href='index.php'>Logged in as: " .$name. "</a>";
} else {
    echo "<a class='navbar-brand' href='index.php'>Nume Firma</a>";
}



?>   


                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navBarSupportedContent"
                >
                
                <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Afisez ce avem in meniu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <!-- Primul item din meniu -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <!-- Al doilea item din meniu -->
                        <li class="nav-item">
                            <a class="nav-link" href="about.php"><i class="fas fa-question-circle"></i> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php"><i class="far fa-address-book"></i> Shop</a>
                        </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="contact.php"><i class="far fa-paper-plane"></i> Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin_login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                                </li>
                            
            
                    </ul>
                    <!-- Buton de cautare -->
                    <ul class="navbar-nav ml-auto">
                      <form class="form-inline" action="cauta.php" method="GET">
                          <input class="form-control mr-sm2" type="search" placeholder="Find a product" name="cauta" aria-label="Search" required>
                          &nbsp;
                          <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                      </ul>
                </div>
            
            </nav>




