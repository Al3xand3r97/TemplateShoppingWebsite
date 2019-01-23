
<?php
session_start();
include 'conn.php';
include 'owner_header.php';
$id_produs = "";
$price = "";
$name = "";
$type = "";
$editat = 0;
// Verific daca s-a apasat butonul de editare
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    
    $price = mysqli_escape_string($db, $price);
    $name = mysqli_escape_string($db, $name);
    $type = mysqli_escape_string($db, $type);

    $query = mysqli_query($db, "UPDATE produse SET price = '" . $price . "',
                                               name = '" . $name . "',
                                               type = '" . $type . "'
                                           WHERE id = '" . $id . "'  ");

    if (mysqli_affected_rows($db)) {
        $editat = 1;
    }

}
// Verific daca s-a trimis un ID al produsului pe care vreau sa il modific
if (isset($_GET['id_produs'])) {

    $query = mysqli_query($db, "SELECT * FROM produse WHERE id = '" . $_GET['id_produs'] . "'");
    //Salvez datele in variabile
    while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
        $id_produs = $row['id'];
        $price = $row['price'];
        $name = $row['name'];
        $type = $row['type'];
    }

}
?>

    <div class="container">
        <div class="col-12 jumbotron">
            <h1 class="text-center">Edit Products</h1>
            <span class="col-12 badge badge-success" style="display:none;" id="verde"> </span>
            <br />
            <?php
if ($editat == 1) {
    echo "<script>
    
        alert('Product successfully edited');
    
    </script>";
}
?>
            <form action="edit_produse.php" method="POST">
                <input type="hidden" name = "id" value=<?php echo $id_produs; ?>>
                Name: <input value=<?php echo $name; ?> type="text" class="form-control" id="name" name="name"> <br />
                Price: <input value=<?php echo $price; ?> type="text" class="form-control" id="price" name="price"> <br />
                Type: <input value=<?php echo $type; ?> type="text" class="form-control" id="type" name="type"> <br />
                
                <br />
                <input type="submit" name = "submit" value="Edit" class="btn btn-success">
            </form>

        </div>


    </div>

  <?php
include 'owner_footer.php';
?>