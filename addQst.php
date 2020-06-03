<?php
require("connexion.php");
session_start();
$usermail = $_SESSION['mail'];
$iduser = $_SESSION['userid'];
$inputMt = $_POST['matiere'];
$inputCrs = $_POST['cours'];
$inputMsg = $_POST['description'];
$reqq = "SELECT COUNT(cours) FROM demande WHERE idetudiantc = '" . $iduser . "'  AND cours = '" . $inputCrs . "';";
$sqli = mysqli_query($conn, $reqq);
$counter = mysqli_fetch_array($sqli);
if($counter[0] == 0){
    if (!empty($_SESSION['mail'] && $_POST['description'])) {
        $sql = "INSERT INTO demande (description,idetudiantc,cours,reponce) VALUES ( '" . $inputMsg . "' , '" . $iduser . "'  ,  '" . $inputCrs . "',0)";
        $res = mysqli_query($conn, $sql);
            header('Location: Student.php');
    }elseif (!empty($_SESSION['mail'] )){
        $sql = "INSERT INTO demande (description,idetudiantc,cours,reponce) VALUES ( 'Aucune desciption !' , '" . $iduser . "'  ,  '" . $inputCrs . "',0)";
        $res = mysqli_query($conn, $sql);
        header('Location: Student.php');
    };
}else{
    header('Location: Student.php');
    echo "<script>
    alert('Vous-avez déja une demande pour se coure');
    </script>";
};



