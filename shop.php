<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    include 'header.php';
} else {
    include 'owner_check.php';
}

$query = mysqli_query($db,"SELECT * FROM produse");

?>

<div class="container">
        <div class="col-12 text-center">

<table class="table table-striped text-center" border="2">
<thead class="thead-dark">
<tr>
  <th scope="col">Product Name</th>
  <th scope="col">Price</th>
  <th scope="col">Type</th>
  <th scope="col">Buy</th>
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
      <a class="btn btn-success"  href="add_cos.php?id_produs=<?php echo $id; ?>">Buy</a>
     </td>
    </tr>
            <?php
            }
            ?>

</tbody>
        </table>


        </div>
</div>
</body>
<?php

include 'footer.php';

?>


