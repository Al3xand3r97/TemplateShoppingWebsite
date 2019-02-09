<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
} else {
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
$produs_cumparat = 0;
if (isset($_GET['id_produs'])) {
    $id_produs = $_GET['id_produs'];
    $query = mysqli_query($db, "INSERT INTO cos_cumparaturi(id_produs, admin_id)
                                VALUES ('" . $id_produs . "', '" . $_SESSION['id'] . "')");
                        
    if (mysqli_insert_id($db)) {
        $produs_cumparat = 1;
    }

}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produse</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="col-12">
        <?php
        if(isset($_GET['id_produs'])){
            $name = mysqli_fetch_array(mysqli_query($db, "SELECT name FROM produse WHERE id='".$_GET['id_produs']."'"), MYSQLI_BOTH);
            $name = $name[0];
if ($produs_cumparat == 1) {
    echo "<h1 class='text-center'>Ai adaugat $name in cosul de cumparaturi cu succes</h1>";
}
        }
?>
            <table class="table table-striped text-center" style="border-style: double; border-radius:5px">
                <thead class="thead-dark">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Buy</th>
                </thead>
                <tbody>
                   <?php
$query = mysqli_query($db, "SELECT * FROM produse");

while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
    $id_produs = $row['id'];
    $nume_produs = $row['name'];
    $pret_produs = $row['price'];
    $categorie_produs = $row['type'];

    ?>
                            <tr>
                                <td><?php echo $nume_produs; ?></td>
                                <td><?php echo $pret_produs; ?></td>
                                <td><?php echo $categorie_produs; ?></td>
                                <td>
                                    <a class="btn btn-success" href="add_cos.php?id_produs=<?php echo $id_produs ?>">Buy</a>
                                </td>
                            </tr>


                   <?php
}
?>
                </tbody>
            </table>
            <a href="logout.php" class="btn btn-secondary">Log out</a>
            <?php

$query = mysqli_query($db, "SELECT id FROM cos_cumparaturi WHERE admin_id = '" . $_SESSION['id'] . "'");
$numarProduse = mysqli_num_rows($query);
?>
            <a href="cos_cumparaturi.php" class="btn btn-primary">Cos cumparaturi(<?php echo $numarProduse; ?>)</a>
        </div>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
