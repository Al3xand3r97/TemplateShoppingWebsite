<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    include 'header.php';
} else {
    include 'owner_check.php';
}
?>
<body style="background-color:#B0C4DE">
<div class="container">
    <div class="jumbotron text-center">
    <h1>Welcome, <?php echo $name; ?>!</h1>
        
    </div>
</div>
<?php
    include 'footer.php';
    ?>