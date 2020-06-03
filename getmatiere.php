<?php
require "connexion.php";
$c = intval($_GET['c']);
//$_SESSION['selmatiere'] = $c;
$sql1 = "SELECT * FROM `matiere` WHERE idfiliere = " . $c . "";
$send1 = mysqli_query($conn, $sql1);
if ($send1 = mysqli_query($conn, $sql1)) {
    while ($row = mysqli_fetch_array($send1)) {
        echo "<option value='  $row[0]  '> $row[1]  </option>'";
    };
}
