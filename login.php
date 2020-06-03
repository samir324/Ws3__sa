<?php
require("connexion.php");
session_start();
if (isset($_POST['your_email']) && isset($_POST['your_pass'])) {
    $your_email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['your_email']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['your_pass']));
    if ($_POST["userType"] == "student") {
        $requete = "SELECT * FROM etudiant where
               mailetudiant = '" . $your_email . "' and passwordetudiant = '" . hash('sha256', $password) . "' ";
        $exec_requete = mysqli_query($conn, $requete);
        $reponse = mysqli_fetch_array($exec_requete);
        if (!empty($reponse['mailetudiant'])) // nom d'utilisateur et mot de passe correctes
        {
            // get infos
            $_SESSION['userid'] = $reponse['idetudiant'];
            $_SESSION['firstName'] = $reponse['nometudiant'];
            $_SESSION['lastName'] = $reponse['prenometudiant'];
            $_SESSION['nvScolaire'] = $reponse['niveauscolaire'];
            $_SESSION['banche'] = $reponse['filiere'];
            $_SESSION['mail'] = $reponse['mailetudiant'];
            $_SESSION['password'] = $reponse['passwordetudiant'];
            echo($reponse);
            header('Location: Student.php');
        } else {
            header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    elseif ($_POST["userType"] == "teacher") {
        $_SESSION['type'] = $_POST['userType'];
        $requete = "SELECT * FROM benevole WHERE mailbenevole = '" . $your_email . "' and passwordbenevole = '" . $password . "'";
        $exec_requete = mysqli_query($conn, $requete);
        $reponse = mysqli_fetch_array($exec_requete);
        if (!empty($reponse['mailbenevole'])) // nom d'utilisateur et mot de passe correctes
        {
            $_SESSION['idProf'] = $reponse['idbenevole'];
            $_SESSION['teacherFname'] = $reponse['nombenevole'];
            $_SESSION['teacherLname'] = $reponse['prenombenevole'];
            $_SESSION['mailb'] = $reponse['mailbenevole'];
            $_SESSION['password'] = $reponse['passwordbenevole'];
            header('Location: Teacher.php');
        } else {
            header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    } else {
        header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
} else {
    header('Location: index.php?error=ddddd');
}
mysqli_close($conn); // fermer la connexion
?>