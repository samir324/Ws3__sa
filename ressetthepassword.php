<?php
require("connexion.php");
session_start();
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
if(!empty($email)){
    $sql = "SELECT * FROM `etudiant` WHERE mailetudiant = '". $email ."';";
    $result = $conn->query($sql);
    $reponse = mysqli_fetch_array($result);
    if(!empty($reponse['mailetudiant'])){
        if ($password1 == $password2) {
            $sql = "UPDATE `etudiant` SET `passwordetudiant` = '" . hash('sha256', $password1) . "' WHERE `mailetudiant` = '". $email ."';";
            $req = mysqli_query($conn,$sql);
            header("location: index.php");
            echo "<script>alert('Done')</script>";
        }else {
            header("location: resetthepassword.php");
        }
    }
    else{
        header("location: forget_the_password.php");
    }
}
?>