<?php
include("connexion.php");
$pageTitle = "Bénévole Profile";
include('navbar.php');
if (empty($_SESSION['mailb'])) {
    header('Location: index.php');
}
?>
<div class="vertical-nav pt-lg-5" id="sidebar">
    <div class=" mb-4  menu-head text-center d-flex flex-column align-items-center">
        <i class="far fa-user img-thumbnail shadow-sm rounded-circle p-3"
           style="font-size: 40px; color: #00BFA6"></i>
        <div class="media d-flex align-items-center ">
            <div class="media-body">
                <h3 class="">
                    <?php
                    if (!empty($_SESSION['mailb'])) {
                        echo($_SESSION['teacherFname'] . ' ' . $_SESSION['teacherLname']);
                    };
                    ?>
                </h3>
                <p class="font-weight-light text-muted mb-0">Bénévole</p>
            </div>
        </div>
        <div class="mt-4">
            <h6 class='text-center'>
                <?php
                if (!empty($_SESSION['mailb'])) {
                    echo(' ' . $_SESSION['mailb']);
                };
                ?>
            </h6>
        </div>
        <div class="p-2  mb-5">
            <?php
            if (!empty($_SESSION['mailb'])) {
                echo "
            <div class='btn_add_event'>
                <button id='add_event_btn' type='button'>Ajouter l'événement</button>
            </div>
            <div class='mt-2'>
                <a  href=\"logout.php\">
                    <button class='btn btn-danger rounded-pill'>Déconnexion</button>
                </a>
            </div>
                ";
            }
            ?>
        </div>
    </div>
</div>

<div class="page-content pl-4" id="content">
    <!-- Toggle button -->
    <button class="btn btn-dark bg-dark rounded-pill shadow-sm px-4 m-4" id="sidebarCollapse" type="button">
        <small class="text-uppercase font-weight-bold" id="togl"> <<< </small>
    </button>
    <div class="containers">
        <div class="statistics">
            <div class="chart_title">
                <h4 class="chart_title_h2 historique">Les cours les plus demandés :</h4>
            </div>
            <?php
            if (!empty($_SESSION['mailb'])) {
                $therequet = "SELECT COUNT(d.cours) AS num, d.cours,c.nomcours , m.nommatiere FROM demande d INNER JOIN cours c ON 
           d.cours = c.idcours INNER JOIN matiere m ON c.idmatiere = m.idmatiere GROUP BY d.cours ORDER BY COUNT(d.cours) DESC;";
                $do = mysqli_query($conn, $therequet);
                if ($do = mysqli_query($conn, $therequet)) {

                    while ($array = mysqli_fetch_array($do)) {
                        echo '<div class="row  font-weight-bold align-items-center text-center" style="min-width: 16em ; max-width: 100%">
                   <div class="col-sm m-2 rounded p-3 text-truncate backRed">' . $array[3] . '</div>

                   <div class="col-sm m-2 rounded p-3 text-truncate backOrange" data-toggle="tooltip" data-placement="top" title="' . $array[2] . '">' . $array[2] . '</div>
                    <div class="col-sm m-2 rounded p-3 text-truncate backGreen">' . $array[0] . '</div>
                    </div>
                    <hr class="backRed">';
                    };
                } else {
                    echo "<h5 class='text-danger text-center font-weight-bold mt-5'>Aucune demande</h5>";
                };
            };
            ?>
        </div>
    </div>
    <div class="containers">
        <h4 class="historique">Évènements :</h4>
        <div class="d-flex justify-content-around flex-wrap align-items-center">
            <?php
            setlocale(LC_ALL, 'fr_FR');
            $sql = "SELECT e.coursID,e.message , e.hours, e.theDate, c.nomcours , COUNT(r.idetudiant) AS num,e.eventID  FROM theevanets e INNER JOIN reponce r ON e.eventID = r.idevent INNER JOIN cours c ON e.coursID = c.idcours  WHERE e.ProfID = " . $_SESSION['idProf'] . " GROUP BY r.idevent;";
            $run = mysqli_query($conn, $sql);
            $Arry = mysqli_fetch_all($run, MYSQLI_ASSOC);
            if ($run = mysqli_query($conn, $sql)) {
                foreach ($Arry as $Arr) {
                    //***** Change Date Format and Language *****//
                    $newDate = dateToFrench($Arr['theDate'], "l , d , M , Y");
                    echo "
            <div class=\"card m-2 position-relative\" style='max-width: 26em'>
                <div class='card-header text-center backOrange'>
                    <h4 class=\"card-title font-weight-bold mt-2 \">" . $Arr['nomcours'] . "</h4>
                </div>
                <div class=\"card-body text-left\">
                    <p class=\"card-text text-wrap\">Description sur l'évènement : <br>" . $Arr['message'] . "</p>
                    <hr>
                    <p class=\"card-text\">Le " . $newDate . ' à ' . $Arr['hours'] . "</p>
                    <hr>
                    <p class=\"card-text \">Les participants : <span class='backGreen rounded-circle p-2 pl-3 pr-3 ml-2'>" . $Arr['num'] . "</span> </p>
                    <hr>
                    <button class='btn deldemande'' type='submit' onclick='removeFrom(" . $Arr['eventID'] . ")'>
                    <input type='text' hidden value='" . $Arr['eventID'] . "' id='remove_" . $Arr['eventID'] . "'>
                        <i class=\"fas fa-trash-alt\"></i>
                    </button>
                </div>
              <input  onclick='hidelist(" . $Arr['eventID'] . ")' type='button'  class='btn w-75 text-left' value='Afficher la list'/>
          <div id=\"eventlist\" class=\"popup hide toggll" . $Arr['eventID'] . " \">
            <section class=\"sign-in p-2\">
                <div class=\"container\">
                    <div id=\"exit\" onclick='hidelist(" . $Arr['eventID'] . ")'>
                        <i class=\"fas fa-times\"></i>
                    </div>
                    <form action=\"quickstart.php\" method=\"post\">
                        <div class=\"table-responsive\">
                            <table class=\"table\">
                                <thead class=\" thead-dark\">
                                <tr class=''>
                                    <th scope=\"col\">Selectionner</th>
                                    <th scope=\"col\">Prénom</th>
                                    <th scope=\"col\">Nom</th>
                                    <th scope=\"col\">Adresse mail</th>
                                </tr>
                                </thead>
                                <tbody>";

                    $sql = "SELECT r.idetudiant,e.nometudiant,e.prenometudiant, e.mailetudiant ,r.idevent FROM reponce r 
                            INNER JOIN etudiant e on r.idetudiant = e.idetudiant WHERE r.idevent =
" . $Arr['eventID'] . " ";
                    $req = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_all($req);
                    foreach ($result as $row) {
                        echo "
                            <tr>
                              <th scope=\"row\">
                                <div class=\"custom-control custom-checkbox mr-sm-2\">
                                <input type='text' hidden name='ids' value='" . $row[4] . "'>
                                <input type=\"checkbox\" value='" . $row['3'] . "' class=\"custom-control-input\" id=\"check" . $row[0] . "\" name='emails[]'>
                                <label class=\"custom-control-label\"  for=\"check" . $row[0] . "\">Choisir</label>
                                </div>
                              </th>
                              <td>" . $row['2'] . "</td>
                              <td>" . $row['1'] . "</td>
                              <td>" . $row['3'] . "</td>
                            </tr>  
                    ";
                    };
                    echo "
                            </tbody>
                            </table>
                            <div class=\"text-right\">
                                <button type=\"submit\" class=\"btn backOrange m-1 rounded-pill\">Envoyer !</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
     </div>       
        ";
                }
            };
            ?>
        </div>
    </div>
    <div class="containers">
        <h2 class="historique">Historique :</h2>
        <div class="d-flex flex-wrap flex-column align-items-center justify-content-center">
            <div class="col-4 mb-3 ">
                <form action="" method="post" class="w-100">
                    <div class="d-flex justify-content-between aline-items-baseline">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <select class="custom-select" name="nScolaire" id="nScolaire"
                                        onchange="showfilliers(this.value)">
                                    <option selected>Niveau Scolaire</option>
                                    <?php
                                    $sql = "SELECT * FROM `niveau`";
                                    $send = mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_all($send, MYSQLI_ASSOC);
                                    foreach ($rows as $row) {
                                        echo '<option value=' . $row['idniveau'] . '> ' . $row['niveau'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <select class="custom-select ml-2" name="filier" id="filieres"
                                        onclick="showMatieres(this.value)">
                                    <option value="" selected disabled> Choisir une filiere</option>
                                </select>
                                <select class="custom-select ml-2" name="matiere" id="matieres"
                                        onchange="getMatieres(this.value)">
                                    <option value="" SELECTED disabled>Matières</option>
                                </select>
                                <input type="text" hidden value="" name="selMatiere" id="selMatieres">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" id="" class="btn backRed btn-lg">Choisir</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
            <div class="d-flex flex-wrap justify-content-around m-2">
                <?php
                if (isset($_POST['submit'])) {
                    $matiereT = $_POST['selMatiere'];
                    $req = "SELECT c.nomcours, e.prenometudiant, e.nometudiant, d.description,  m.nommatiere FROM demande d 
    INNER JOIN etudiant e ON d.idetudiantc = e.idetudiant INNER JOIN cours c ON c.idcours = d.cours 
    INNER JOIN matiere m ON m.idmatiere = c.idmatiere WHERE m.idmatiere = '" . $matiereT . "' ";
                    $reqt = mysqli_query($conn, $req);
                    $row = mysqli_fetch_array($reqt);
                    if ($reqt = mysqli_query($conn, $req)) {
                        if (!empty($_SESSION['mailb'] && $reqt)) {
                            while ($row = mysqli_fetch_array($reqt)) {
                                echo "
                                <div class=\"card  card mb-4 rounded-lg m-2\" style=\"width: 18rem;\">
                                  <div class=\"card-body  p-0\">
                                     <div class='backOrange rounded-top pt-2 p-1 text-center'>
                                             <h5 class=\"card-title font-weight-bold mt-2\">$row[4]</h5>
                                    </div>
                                    <div class='p-2 m-1 text-center'>
                                        <h5 class=\"card-title text-center m-2\">$row[0]</h5>
                                        <hr>
                                        <p class=\"card-text font-weight-light m-2\">$row[3]</p>
                                     </div>
                                  </div>
                                 </div>
                         ";
                            }
                        }
                    }
                } else {
                    $req = "SELECT c.nomcours, e.prenometudiant, e.nometudiant, d.description,  m.nommatiere FROM demande d 
                            INNER JOIN etudiant e ON d.idetudiantc = e.idetudiant INNER JOIN cours c ON c.idcours = d.cours 
                            INNER JOIN matiere m ON m.idmatiere = c.idmatiere";
                    $reqt = mysqli_query($conn, $req);
                    $row = mysqli_fetch_array($reqt);
                    //TODO Wierd !!!
                    if ($reqt = mysqli_query($conn, $req)) {
                        if (!empty($_SESSION['mailb']) && $reqt) {
                            while ($row = mysqli_fetch_array($reqt)) {
                                echo "
                                <div class=\"card  card mb-4 rounded-lg m-2\" style=\"width: 18rem;\">
                                  <div class=\"card-body  p-0\">
                                     <div class='backOrange rounded-top pt-2 p-1 text-center'>
                                             <h5 class=\"card-title font-weight-bold mt-2\">$row[4]</h5>
                                    </div>
                                    <div class='p-2 m-1 text-center'>
                                        <h5 class=\"card-title text-center m-2\">$row[0]</h5>
                                        <hr>
                                        <p class=\"card-text font-weight-light m-2\">$row[3]</p>
                                     </div>
                                  </div>
                                 </div>
                                 ";
                            }
                        }
                    }
                } ?>
            </div>
        </div>
    </div>


    <div style="display :none;" id="pop-up-add_events" class="pop-up-add_events">
        <div class="pop-up-add_event">
            <form method="POST" action="addEvent.php">
                <div class="clouse">
                    <svg id="img_close" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times"
                         class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 352 512">
                        <path style="fill: #F50057;" fill="currentColor"
                              d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path>
                    </svg>
                </div>
                <div class="pop-up-add_event_matairs">
                    <div>
                        <select class="custom-select" name="nScolaire" id="nScolaire"
                                onchange="showfillier(this.value)">
                            <option selected>Niveau Scolaire</option>
                            <?php
                            $sql = "SELECT * FROM `niveau`";
                            $send = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_all($send, MYSQLI_ASSOC);
                            foreach ($rows as $row) {
                                echo '<option value=' . $row['idniveau'] . '> ' . $row['niveau'] . '</option>';
                            }
                            ?>
                        </select>
                        <select class="custom-select " name="filier" id="filiere"
                                onclick="showMatiere(this.value)">
                            <option value="" selected disabled> Choisir une filiere</option>
                        </select>
                        <select class="custom-select " name="matiere" id="matiere"
                                onclick="showCours(this.value)">
                            <option value="" SELECTED disabled>Matières</option>
                        </select>
                        <select class="custom-select " name="cours" id="cours"
                                onclick="getCours(this.value)">
                            <option value="" SELECTED disabled>Cours</option>
                        </select>
                        <input type="text" hidden id="selCours" name="selCours" value="">
                    </div>
                </div>
                <div class="Date">
                    <div> la date
                        <div><input class="thedate" type="date" name="date" id="date"></div>
                    </div>
                    <div class="hour">
                        l'heure
                        <div><input class="thedate ml-2" type="time" id="appt" name="hours"></div>
                    </div>
                </div>
                <div class="form-group Date" style="max-width: 250px">
                    le dernier délai de participation
                    <input class="thedate" type="date" name="lastdate" id="lastdate">
                </div>
                <div>
                    <textarea class="message" name="message" id="message" name="message" cols="30" rows="10"
                              placeholder="Votre message"></textarea>
                </div>
                <button type="submit">Ajouter l'événement</button>
            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
<script src="src/js/script.js"></script>
<script src="src/js/student.js"></script>
<script>
	// ** Add Event Teacher
	function showfillier(str) {
		if (str == "") {
			document.getElementById("filier").innerHTML = "";
			return;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("filiere").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "getfillier.php?q=" + str, true);
			xmlhttp.send();
		}
	}
	function showMatiere(str) {
		if (str == "") {
			document.getElementById("matiere").innerHTML = "";
			return;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("matiere").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "getmatiere.php?c=" + str, true);
			xmlhttp.send();
		}
	}

	function showCours(str) {
		if (str == "") {
			document.getElementById("cours").innerHTML = "";
			return;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("cours").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "getcours.php?c=" + str, true);
			xmlhttp.send();
		}
	}
	function getCours(str) {
		document.getElementById('selCours').value = str;
	}
	// ** Filter Matiere
	function showfilliers(str) {
		if (str == "") {
			document.getElementById("filieres").innerHTML = "";
			return;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("filieres").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "getfillier.php?q=" + str, true);
			xmlhttp.send();
		}
	}
	function showMatieres(str) {
		if (str == "") {
			document.getElementById("matieres").innerHTML = "";
			return;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("matieres").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "getmatiere.php?c=" + str, true);
			xmlhttp.send();
		}
	}
	function getMatieres(str) {
		document.getElementById('selMatieres').value = str;
	}
	function removeFrom(val) {
		let str;
		let xmlhttp = new XMLHttpRequest();
		str = document.getElementById("remove_" + val).value;
		xmlhttp.open("GET", "removeFrom.php?r=" + str, true);
		xmlhttp.send();
		setTimeout(reloadpage, 1000)
	}
	function reloadpage() {
		location.reload();
	}
	let exit = document.querySelector('#exit');
	let loginPopup = document.querySelector('.popup');
	function hidelist(x) {
		$('.toggll' + x).toggle('hide');
	};
</script>