<?php
require "connexion.php";
$q = intval($_GET['q']);
echo " <select class=\"custom-select\" name=\"filier\" id=\"filier\">";
$sql1 = "SELECT * FROM `filiere` WHERE idniveau = " .$q . "";
$send1 = mysqli_query($conn, $sql1);
if ($send1 = mysqli_query($conn, $sql1)) {
    while ($row = mysqli_fetch_array($send1)) {
        echo "<option value='  $row[0]  '> $row[1]  </option>'";
    };
}
echo " </select>";
