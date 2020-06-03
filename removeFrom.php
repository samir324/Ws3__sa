<?php
require("connexion.php");
session_start();
if (!empty($_SESSION['mailb'])){
$idevent = intval($_GET['r']);
$sql = "DELETE FROM `theevanets` WHERE `theevanets`.`eventID` = " . $idevent . " ";
$send = mysqli_query($conn, $sql);
}else
if (!empty($_SESSION['mail'])){
    $iddemande = intval($_GET['e']);
    $sql = "DELETE FROM `demande` WHERE `iddemande` = " . $iddemande . " ";
    $send = mysqli_query($conn, $sql);
}
