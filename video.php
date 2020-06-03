<?php
require("connexion.php");
$pageTitle = "Voir des enregistrements";
include "navbar.php";?>
<div class=".container-{breakpoint} d-flex flex-row flex-wrap-reverse justify-content-around">
  
    <div class=" w-75 ml-0 mr-0">
        <div class="Post_problem">
            <form action="addQst.php" method="post">
                <h2 class="historique d-inline-block " >Précisi votre recherche:</h2>
                <div class="post_pro ">
                    <div class="find_help " style="margin-top:7%">
                        <div>
                            <select name="nvscolaire" id="nvscolaire">
                                <option value="2">2eme année Bac</option>
                                <option value="1">1er année Bac</option>
                            </select>
                            <input type="text" hidden value="" name="nv" id="niveauS">
                        </div>
                        <div>
                            <!-- Matiers -->
                            <select name="matiere" id="matiere">
                                <option value="1">Mathématique</option>
                                <option value="2">Sciences de la vie et de la Terre</option>
                                <!--<option value="3">Philosophique</option>-->
                                <option value="3">Physique Chimie</option>
                                <!-- <option value="5">Anglais</option>-->
                            </select>
                            <input type="text" hidden value="" name="mt" id="matieres">
                        </div>
                        <div>
                            <select class="hour2" name="cours" id="cours">
                                <optgroup label="Analyse">
                                    <option value="1">Continuité d'une fonction numérique</option>
                                    <option value="2">Dérivabilité d'une fonction, fonctions primitives</option>
                                    <option value="3">Etude des fonctions</option>
                                    <option value="4">Fonctions logarithmiques</option>
                                    <option value="5">Calcul intégral</option>
                                    <option value="7">Equations différentielles</option>
                                    <option value="8">Les suites numériques</option>
                                    <option value="9">Fonctions exponentielles</option>
                                </optgroup>
                                <optgroup label="Algèbre">
                                    <option value="10">Les nombres complexes 1</option>
                                    <option value="11">Les nombres complexes 2</option>
                                    <option value="12">Calcul des Probabilités</option>
                                    <option value="13">Geométrie de l’espace Produit scalaire et applications</option>
                                    <option value="14">Fonctions exponentielles</option>
                                </optgroup>
                            </select>
                            <input type="text" hidden value="" name="crs" id="courses">
                        </div>
                        <div >
                            <button class="btn_post" type="submit"><i class="fas fa-search m-1 "></i>chercher</button>
                        </div>
                    </div>
                    <div class="w-50  "> 
                        <img src="src/img/bgvideo.png" alt="imgvideo">
                    </div>
                </div>
            </form>
        </div>
        <div class="containers">
            <h2 class="historique d-inline-block bBottom">Les videos:</h2>
            <div class="d-flex flex-wrap justify-content-around m-2">
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>