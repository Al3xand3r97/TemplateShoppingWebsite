<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    include 'header.php';
} else {
    include 'owner_check.php';
}
?>
<body style="background-color:#B0C4DE">
    <div class="container" >
        <div class="col-12 jumbotron" style="background-color: #E6E6FA">
            <p class="text-center"><h1>Homepage</h1></p><hr style="height: 12px;border: 0;box-shadow: inset 0 12px 12px -12px">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        </div>
    </div>

<?php
include 'footer.php';
?>