<?php
session_start();
include 'conn.php';
include 'owner_header.php';
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['type'];

$name_safe = mysqli_escape_string($db, $name);
$price_safe = mysqli_escape_string($db, $price);
$type_safe = mysqli_escape_string($db, $type);

$query = mysqli_query($db, "INSERT INTO produse(name, price, type)
                        VALUES ('$name_safe', '$price_safe', '$type_safe')");

if (mysqli_insert_id($db)) {
?>
    <div class="container">
        <div class="col-12 jumbotron text-center">
                <h2>We added <?php echo $name ?>, price <?php echo $price ?>, type <?php echo $type ?> into the database!</h2>

        </div>
    </div>
<?php
} else {
    echo mysqli_error($db);
}

?>
<?php
    include 'footer.php';
    ?>