<?php
session_start();
function dateToFrench($date, $format)
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--    Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8ac7442e81.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/main.css"/>
    <link href="src/img/icon.ico" rel="shortcut icon"/>
    <title><?php echo $pageTitle ;?></title>
</head>
<body>
<nav class="sticky-top justify-content-around ">
    <a class="navbar-brand ml-4 " href="index.php">
        <img src="src/img/salog1.png"  class="d-inline-block align-top ml-4" alt="">
    </a>
    <div class="  text-center ">
        <h1 class=" font-weight-bold text-white text-center">
            Sway3
        </h1>
    </div>
    
    <div>
        <div class="p-2">
            <?php
            if (!empty($_SESSION['mail'])) {
                echo "
              <div class=\"rounded-circle p-2 \">
                <a href=\"Student.php\">
                <i class=\"fas iconProfile fa-user-circle\"></i>
                </a>
              </div>
                ";
            }else
            if (!empty($_SESSION['mailb'])){
                echo "
                <div class=\"rounded-circle p-2 \">
                    <a href=\"Teacher.php\">
                        <i class=\"fas iconProfile fa-user-circle\"></i>
                    </a>
                </div>
";
                        }
            ?>
        </div>
        <div class="p-2">
            <!--            -->
            <?php
            if (!empty($_SESSION['type'])) {
                $teacherMail = $_SESSION['mailb'];
                echo
                "
            <div class=' rounded-circle p-2'>
               <a href=\"logout.php\">
            <i class=\"fas deleteSec fa-sign-out-alt\"></i>
                </a>
         </div>
    ";
            } else if (!empty($_SESSION['mail'])) {

                $usermail = $_SESSION['mail'];
                // afficher un message
                echo
                "
            <div class=' rounded-circle p-2'>
               <a href=\"logout.php\">
                    <i class=\"fas deleteSec fa-sign-out-alt\"></i>  
                </a>
         </div>
   ";
            } else {
                echo "
                <div class='header p-0'>
                <div class='header_content'>
                        <button id=\"etud\" onclick=\"logingEtudiant()\" class=\"btn rounded-pill backOrangeN  \"
                                data-target=\"#exampleModalCentertype=\"
                        >Se connecter
                        </button>
           </div>
           </div>     ";
            };
            ?>
        </div>
    </div>
</nav>




