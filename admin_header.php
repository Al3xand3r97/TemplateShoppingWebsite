<?php
    include 'conn.php';
    if (isset($_SESSION['admin_username'])) {
    
    } else {
        header("Location: admin_login.php");
    }
    ?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <title>Normal user</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fa/css/all.css">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
</head>
<body>
        <nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Logged in as: <?php echo $name; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navBarSupportedContent"
                >
                
                <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Afisez ce avem in meniu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="about.php"><i class="fas fa-question-circle"></i> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php"><i class="fas fa-shopping-cart"></i> Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cos_cumparaturi.php"><i class="fas fa-shopping-basket"></i> Shopping Cart</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><i class="far fa-user"></i> View Profile</a>
                        </li>
                       
                        <li class="nav-item">
                                    <a class="nav-link" href="contact.php"><i class="far fa-paper-plane"></i> Contact</a>
                                </li> 

                        <li class="nav-item">   
                                <form action = "logout.php" method = "POST"> 
                                    <button class="btn btn-outline-danger" type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
                                </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                      <form class="form-inline" action="cauta.php" method="GET">
                          <input class="form-control mr-sm2" type="search" placeholder="Find a product" name="cauta" aria-label="Search" required>
                          &nbsp;
                          <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i> Search</button>
                      </form>
                      </ul>
                      
                </div>
            
            </nav>




