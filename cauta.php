<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    include 'header.php';
} else {
    include 'owner_check.php';
}
?>

<div class="container">
    <div class="col-12">

<h2>Search results for: <?php echo $_GET['cauta']; ?></h2>
<br />

<?php
$textCauta = $_GET['cauta'];
$query = mysqli_query($db, "SELECT * FROM produse WHERE name LIKE '%" . $textCauta . "%'
                                                  OR price LIKE '%" . $textCauta . "%'
                                                  OR type LIKE '%" . $textCauta . "%'");

$result = mysqli_num_rows($query);
if($result) {

  echo  '<table class="table table-striped text-center" style="border-style: double; border-radius:5px">
<thead class="thead-dark">
<tr>
  <th scope="col">Name</th>
  <th scope="col">Price</th>
  <th scope="col">Type</th>
  <th scope="col">Buy</th>
</tr>
</thead>
<tbody>';


  while($row = mysqli_fetch_array($query, MYSQLI_BOTH)) { 


    $id_produs = $row['id'];
    $name = $row['name'];
    $price = $row['price'];
    $type = $row['type'];

      
?>
<tr>
      <td><?php echo $name; ?></td>
      <td><?php echo $price; ?></td>
      <td><?php echo $type; ?></td>
      <td>
         <a class="btn btn-success" href="add_cos.php?id_produs=<?php echo $id_produs ?>">Buy</a>
      </td>
    </tr>
            <?php
            
        } //end of while
        
        
        } //end of if

        else {
            echo "<h1><center><font color='red'>There are no records in the database!</font></center></h1>";
        }
            ?>

</tbody>
        </table>

        </div>
</div>

<?php

include 'footer.php';
 
?>