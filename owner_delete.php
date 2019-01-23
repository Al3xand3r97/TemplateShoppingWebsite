<?php
session_start();
include 'conn.php';
// Verific daca s-a trimis data de stergere
if (isset($_GET['id_produs'])) {

    $query = mysqli_query($db, "DELETE FROM produse WHERE id = '" . $_GET['id_produs'] . "'");
}

header("Location:owner_see.php");

?>
