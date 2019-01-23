<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    include 'header.php';
} else {
    include 'owner_check.php';
}

// isset - verifica daca variabila din paranteza exista sau a fost trimisa
$comandaPlasata = 0;
if (isset($_GET['cumpara'])) {
    //Stergem din baza de date
    $query = mysqli_query($db, "DELETE FROM cos_cumparaturi WHERE admin_id = '" . $_SESSION['id'] . "'");
    //Verificam daca s-a sters
    if (mysqli_affected_rows($db)) {
        $comandaPlasata = 1;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cos cumparaturi</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>

<div class="container">
        <div class="col-12">
            <?php
if ($comandaPlasata == 1) {
    echo "<h1>Comanda a fost plasata cu succes.</h1>";
}

?>
<?php
$query = mysqli_query($db, "SELECT * FROM cos_cumparaturi WHERE admin_id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($query, MYSQLI_BOTH);
$id_produs = $row['id_produs'];
$query2 = mysqli_query($db, "SELECT * FROM produse WHERE id = '" . $id_produs . "'");
$result = mysqli_num_rows($query2);
if($result){
    echo"
            <table class='table text-center' style='border-style: double; border-radius:5px'>
                <thead class='thead-dark'>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                </thead>
                <tbody>
                ";
}
?>
<?php
$sumaTotala = 0;
$query = mysqli_query($db, "SELECT * FROM cos_cumparaturi WHERE admin_id = '" . $_SESSION['id'] . "'");

while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
    $id_produs = $row['id_produs'];
    $query2 = mysqli_query($db, "SELECT * FROM produse WHERE id = '" . $id_produs . "'");

    while ($row2 = mysqli_fetch_array($query2, MYSQLI_BOTH)) {
        $nume_produs = $row2['name'];
        $pret_produs = $row2['price'];
        $categorie_produs = $row2['type'];

        $sumaTotala = $sumaTotala + $pret_produs;

        ?>
                            <tr>
                                <td><?php echo $nume_produs; ?></td>
                                <td><?php echo $pret_produs; ?></td>
                                <td><?php echo $categorie_produs; ?></td>
                            </tr>


                   <?php
}}
?>
                </tbody>
            </table>
            
            <h2>Suma totala: <?php echo $sumaTotala; ?></h2>
            <?php
            if($sumaTotala > 0) {
                echo "<a href='cos_cumparaturi.php?cumpara=1' class='btn btn-danger'>Plaseaza comanda</a>";
            } else {
                echo "<a href='shop.php' class='btn btn-success'>Go back</a>";
            }
?>
            
        </div>
    </div>

 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
</body>
</html>
