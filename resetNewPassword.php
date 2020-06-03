<?php
require("connexion.php");
include("navbar.php");
?>    
<div class="signin-content">
<div class="signin-image">
    <figure><img src="src/img/signin-image.jpg" alt="sing up image"></figure>
</div>
<div class="signin-form">
    <h2 class="form-title">Modifier  mode passe Oublie</h2>
    <form method="POST" action="ressetthepassword.php" class="register-form" id="login-form">
        <div class="form-group">
            <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
            <input type="email" name="email" id="your_email" placeholder="Votre Email"/>
        </div>
        <div class="form-group">
            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
            <input type="password" name="password1" id="your_pass" placeholder="Noveau Mot de passe"/>
        </div>
        <div class="form-group">
            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
            <input type="password" name="password2" id="your_pass" placeholder="Confirmé Mot de passe"/>
        </div>

        <input type="text" name="userType" hidden id="userType" value="">
        <div class="form-group form-button">
            <input type="submit" name="send_email" id="signin" class="form-submit" value="Modifier "/>
        </div>
    </form>
</div>
</div>