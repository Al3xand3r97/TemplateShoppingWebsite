<?php
session_start();
include 'conn.php';
$query = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '" . $_SESSION['admin_username'] . "'");
$row = mysqli_fetch_array($query, MYSQLI_BOTH);
$user = $row['admin_username'];
if($user == 'root') {
include 'owner_header.php';

$id_produs = "";
$name = "";
$price = "";
$type = "";
// Verific daca s-a apasat butonul de editare
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
}
$query = mysqli_query($db,"SELECT * FROM produse");

?>
<div class="container">
        <div class="col-12">
        <span class="badge badge-danger" id="sters" style="display:none"></span>
<table class="table table-striped text-center">
<thead>
<tr>
  <th scope="col">Name</th>
  <th scope="col">Price</th>
  <th scope="col">Type</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>

<?php
while($row = mysqli_fetch_array($query, MYSQLI_BOTH)) {
    $id = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $type = $row['type'];

      


?>
<tr>
      <td><?php echo $name; ?></td>
      <td><?php echo $price; ?></td>
      <td><?php echo $type; ?></td>
      <td>
       <a class="btn btn-warning" href="edit_produse.php?id_produs=<?php echo $id ?>">Edit</a>
       |
       <a class="btn btn-danger"  href="owner_delete.php?id_produs=<?php echo $id; ?>">Delete</a>
     </td>
</tr>
            <?php
            }
            ?>

</tbody>
        </table>


        </div>
</div>
<?php
} else {
    header("Location: index.php");
}
?>
<?php

include 'owner_footer.php';

?>


