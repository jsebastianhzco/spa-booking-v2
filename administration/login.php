<!DOCTYPE html>
<html lang="fr" dir="ltr">

<?php include "includes/head.php"; ?>

<body class="layout-login-centered-boxed" style="padding:20px;">





    <div class="layout-login-centered-boxed__form card">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
            <a  class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width:0px;">
                <img class="navbar-brand-icon mr-0 mb-2" src="../img/icons_select/body.svg" alt="Stack">
                <span>Acupuncture Elianne Bouchard</span>
            </a>
            <p class="m-0">               <span>Bonjour,   </span>
                            <?php  echo date('\i\t \i\s \t\h\e jS \d\a\y.');   ?>
 </p>
        </div>
<!--
        <div class="alert alert-soft-success d-flex d-none" role="alert">
            <i class="material-icons mr-3">check_circle</i>
            <div class="text-body">An email with password reset instructions has been sent to your email address, if it exists on our system.</div>
        </div>

        <a href="" class="btn btn-light btn-block">
            <span class="fab fa-google mr-2"></span>
            Continue with Google
        </a>
        <div class="page-separator">
            <div class="page-separator__text">or</div>
        </div>
-->
        <form  method="POST" id="login-form">
        
 

            <div class="form-group">
                <label class="text-label" for="email_2">Username :</label>
                <div class="input-group input-group-merge">
                    <input id="username" type="text" required class="form-control form-control-prepended" placeholder="courriel@acupuncturevalleyfield.ca" name="username">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="far fa-envelope"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="text-label" for="password_2">Mot de passe :</label>
                <div class="input-group input-group-merge">
                    <input id="pass" type="password" required class="form-control form-control-prepended" placeholder="Tapez votre mot de passe" name="pass">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-key"></span>
                        </div>
                    </div>



                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-eye view-pass"></span>
                            
                        </div>
                    </div>



                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary log" >Login</button>
            </div>
            
 

        </form>


    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App -->
    <script src="assets/js/toggle-check-all.js"></script>
    <script src="assets/js/check-selected-row.js"></script>
    <script src="assets/js/dropdown.js"></script>
    <script src="assets/js/sidebar-mini.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/vistaweb.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>
    <script src="session/login-process.js"></script>






</body>

</html>