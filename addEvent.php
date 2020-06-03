<?php
require("connexion.php");
session_start();
$matiere = $_POST['matiere'];
if (isset($matiere)) {
    $cours = $_POST['selCours'];
    $date = $_POST['date'];
    $hours = $_POST['hours'];
    $message = $_POST['message'];
    $idProuf = $_SESSION['idProf'];
    $delay = $_POST['lastdate'];
    if (!empty($hours && $date)) {
        $sql = "INSERT INTO `theevanets`(`coursID`, `ProfID`, `message`, `hours`, `theDate`, `delay`) 
VALUES ('" . $cours . "','" . $idProuf . "','" . $message . "','" . $hours . "','" . $date . "','" . $delay . "') ";
        $select = mysqli_query($conn, $sql);
        header("location: Teacher.php");
    } else {
        echo "<script>alert('veuillez compléter les informations')</script>";
    }
}
?>