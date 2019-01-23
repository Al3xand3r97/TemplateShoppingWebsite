<?php
include 'conn.php';
if (isset($_SESSION['admin_username'])) {
    
} else {
    header("Location: admin_login.php");
}
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