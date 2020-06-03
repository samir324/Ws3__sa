<?php
//session_start();
require("connexion.php");
$pageTitle = "Bienvenu dans Sway3";
include("navbar.php");?>
<!--header-->
<div id="insc" class="registerPopup popup hide">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div id="exit" onclick="hidelist()">
                <i class="fas fa-times"></i>
            </div>
            <div class="signup-content">
                <div class="signup-form">
                    <!--                    Inscriptio-->
                    <h2 class="form-title">Inscription</h2>
                    <form method="POST" action="inscription.php" class="register-form">
                        <!--                        name-->
                        <div class="form-group">
                            <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="fname" placeholder="Votre Nom"/>
                        </div>

                        <div class="form-group">
                            <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="prenom" id="lname" placeholder="Votre Prénom"/>
                        </div>
                        <!--                        Email-->
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Votre Email"/>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <select class="custom-select" name="nScolaire" id="nScolaire" onchange="showfillier(this.value)">
                                    <option selected>Niveau Scolaire</option>
                                    <?php
                                    $sql = "SELECT * FROM `niveau`";
                                    $send = mysqli_query($conn, $sql);

                                    $rows = mysqli_fetch_all($send, MYSQLI_ASSOC);

                                    foreach ($rows as $row ) {

                                        echo '<option value=' . $row['idniveau'] . '> ' . $row['niveau'] . '</option>';

                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" id="filiere">
                                <select class="custom-select" name="filier" id="filier">
                                    <option value="" selected disabled> Choisir une filiere</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Mot de passe"/>
                        </div>
                        <div class="form-group">
                            <label for="pass2"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password2" id="pass" placeholder="Confirmer Mot de passe"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit rounded-pill"
                                   value="Inscrivez-Vousss"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="src/img/signup-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">Vous êtes déjà un member !</a>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="student" class="loginPopup popup hide">

    <!-- Sing in  Form for student -->
    <section class="sign-in">
        <div class="container">
            <div id="exit1">
                <i class="fas fa-times"></i>
            </div>
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="src/img/signin-image.jpg" alt="sing up image"></figure>
                    <a href="forget_the_password.php" class="signup-image-link">Mot de passe Oublié ?</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Se Connecter</h2>
                    <form method="POST" action="login.php" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="your_email" id="your_email" placeholder="Votre Email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Mot de passe"/>
                        </div>

                            <input type="text" name="userType" hidden id="userType" value="">

                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Connexion"/>
                        </div>
                        <?php
                        if (isset($_GET['erreur'])) {
                            $err = $_GET['erreur'];
                            if ($err == 1 || $err == 2)
                                echo "<script>
                                    alert('Utilisateur ou mot de passe incorrect')</script>";
                        }

                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<main>
    <section class="header section backGreen ">
        <div class="container-fluid">
            <div class="header_content">
                <div class="left d-flex flex-column justify-content-center">
                    <div data-aos="fade-right">

                        <h1 class=" animate__slideInLeft">Les bons Profs font des bons élèves </h1>
                        <p class="animate__slideInLeft">Vous trouvez des difficultés au niveau des cours ?
                            Nous avons la solution ! Avec les cours en ligne de <span>Sway3</span>,
                            vous pouvez avoir un professeur qui peut vous
                            assurer des cours de soutien à distance.</p>
                    </div>
                    <div class="btn_for_login ">

                        <button id="etud" onclick="logingEtudiant()" class="btn btn-header"
                                data-target="#exampleModalCentertype="
                        >Connectez-vous "Etudiant(e)"
                        </button>

                        <button id="prof" onclick="logingTeacher()" class="btn btn-header backro"
                                data-target="#exampleModalCentertype="
                        >Connectez-vous "Professeur"
                        </button>
                    </div>
                </div>
                <div class="" data-aos="zoom-in-up">

                    <img class="header_img" src="src/img/undraw_exams_g4ow.svg" alt="img">
                </div>
            </div>
    </section>
    <section class="header section backOrange">
        <div class="container-fluid">
            <div class="header_content">
                <div class="" data-aos="zoom-in-up">

                    <img class="header_img" src="src/img/undraw_reading_time_gvg0.svg" alt="">
                </div>
                <div class="left d-flex flex-column justify-content-center" data-aos="fade-left">
                    <h1>Comment ?</h1>
                    <p>C’est simple, inscrivez-vous en remplissant ce
                        formulaire d’inscription, poster la problématique
                        et réserver vos places.</p>
                    <button id="register" class="btn btn-header btnG" type="button">Inscrivez-vous</button>
                </div>
            </div>
        </div>
    </section>
    <section class="header section backRed ">
        <div class="container-fluid">
            <div class="header_content">
                <div class="left d-flex flex-column justify-content-center">
                    <div data-aos="fade-right">

                        <h1>L'enseignement à distance nous rapproche</h1>
                        <p>Vous avez raté le cour, ne paniquez pas on a pensé à
                            enregistrer les cours en vidéo.</p>
                    </div>
                    <a href="video.php">

                        <button id="" class="btnG btn btn-header" type="button">Voir des vidéos</button>
                    </a>
                </div>
                <div class="" data-aos="zoom-in-up">
                    <img class="header_img" src="src/img/undraw_online_test_gba7.svg" alt="img">
                </div>
            </div>
        </div>
    </section>
</main>

<!--Footer-->
<?php
include "footer.php" ?>

<script>
	// Popups register
	const registerBtn = document.querySelector('#register');
	const registerPop = document.querySelector('.registerPopup');
	registerBtn.addEventListener('click', () => {
		$('.registerPopup').toggle('hide');
	})
	const loginBtn = document.querySelector('#login');
	const loginPopup = document.querySelector('.popup');

	let teacher = document.getElementById("teacher");
	let prof = document.getElementById("prof");
	let student;
	student = document.getElementById("student");
	let exit1 = document.querySelector('#exit1');
	exit1.addEventListener('click', function () {
		student.classList.add('hide');
	});

// ********************

	function showfillier(str) {
		if (str == "") {
			document.getElementById("filier").innerHTML = "";
			return;
		} else {
			let xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("filiere").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","getfillier.php?q="+str,true);
			xmlhttp.send();
		}
	}
	function hidelist() {
		$('#insc').toggle('hide');
	};
</script>
<script src="src/js/collectInfo.js"></script>

