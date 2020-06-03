<?php
//class Fruit {
//    public $idetudiant;
//    public $email;
//
//    function __construct($idetudiant,$email) {
//        $this->id = $idetudiant;
//        $this->email = $email;
//    }
//    function get_name() {
//        return $this->name;
//    }
//}
//
//$apple = new Fruit("Apple");
//echo $apple->get_name();
require "connexion.php";
$mails = $_POST['emails'];
$row = $_POST['ids'];
$sql = "SELECT e.message, e.theDate, e.hours, c.nomcours FROM theevanets e  INNER JOIN cours c ON e.coursID = c.idcours WHERE e.eventID = ". $row ."";
$run = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($run);
$_SESSION['message'] = $arr['message'];
$_SESSION['date'] = $arr['theDate'];
$_SESSION['hours'] = $arr['hours'];
$_SESSION['nomcours'] = $arr['nomcours'];
$_SESSION['mails']= $mails;
header('location :quickstart.php');

