<?php

$db = mysqli_connect("localhost", "root", "", "concursOSF");

if($db) {
  //  echo "Conectat la DB";
} else {
    echo mysqli_error($db);
}

?>