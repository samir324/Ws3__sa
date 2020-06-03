<?php
require "connexion.php";
$c = intval($_GET['c']);
$sql1 = "SELECT * FROM `cours` WHERE idmatiere = " . $c . "";
$send1 = mysqli_query($conn, $sql1);
if ($send1 = mysqli_query($conn, $sql1)) {
    while ($row = mysqli_fetch_array($send1)) {
        echo "<option value='  $row[0]  '> $row[1]  </option>'";
    };
}

