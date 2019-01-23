<?php
include 'conn.php';
session_start();
$query = mysqli_query($db, "SELECT * FROM admin WHERE admin_username = '" . $_SESSION['admin_username'] . "'");
$row = mysqli_fetch_array($query, MYSQLI_BOTH);
$user = $row['admin_username'];
$query2 = mysqli_query($db, "SELECT nume, mail, mesaj, data FROM comments ORDER BY data DESC");
?>
    <?php
        if($user == 'root') {
            include 'owner_header.php';
    ?>
    <div style="text-align:center">
       <table class="table table-striped text-center" style="border-style: double; border-radius: 5px; width: 70%; margin-left:15%; margin-right:15%">
                <thead>
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Message</th>
                    <th>Date</th>
                </thead>
                <tbody>
                   <?php


while ($row = mysqli_fetch_array($query2, MYSQLI_BOTH)) {
    $nume = $row['nume'];
    $mail = $row['mail'];
    $mesaj = $row['mesaj'];
    $data = $row['data'];

    ?>
                            <tr>
                                <td><?php echo $nume; ?></td>
                                <td><?php echo $mail; ?></td>
                                <td style="word-break: break-all" width = "500px"><?php echo $mesaj; ?></td>
                                <td><?php echo $data; ?></td>
                            </tr>


                   <?php
}
?>
                </tbody>
            </table>    
            </div> 
    <?php
        } else {
            include 'admin_header.php';
            echo "<h1><center><font color='red'>You do not have the permission to view this page! Please contact the administrator!</font></center></h1>";

        }

        ?>
<?php
    include 'footer.php';
    ?>