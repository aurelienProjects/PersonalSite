<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '9';
?>

<!doctype html>
<html lang="fr">

<head>
    <title>Aurélien &mdash; Site web</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="images/experts1.ico" />
    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <header class="site-navbar site-navbar-target" role="banner">

            <?php include('menu_nav.php'); ?>

        </header>

        <?php include('background.php'); ?>

        <div class="site-section">
            <div class="container">
                <div class="col-md-7 mb-5">
                    <h2>Changement mot de passe</h2>

                    <br />

                    <?php
                    include('admin/config.php');

                    // Cette condition nous permet de récupérer l'adresse mail de l'utilisateur, car lors du changement du mot de passe ça va rafraichir la page et donc vider le GET
                    if ($_GET['cle'] == '1') {
                        $_SESSION['email'] = $_GET['email'];
                    }

                    if (!empty($_POST)) {

                        $erreurs = array();
                        $email = $_SESSION['email'];

                        $req = $bdd->prepare('SELECT ID,prenom,password,compte_actif FROM membres WHERE email = :email');
                        $req->execute(
                            array(
                                'email' => $email
                            )
                        );
                        $user = $req->fetch(PDO::FETCH_OBJ);

                        // Update du nouveau mdp dans la Bdd avec hashage du mdp                     
                        if ($user) {

                            if ($_POST['password'] == $_POST['password2']) {

                                // Hashage du mdp
                                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                                $req = $bdd->prepare('UPDATE membres SET password=:password_ WHERE email=:email_');
                                $req->execute(array(
                                    'password_' => $password,
                                    'email_' => $email
                                ));

                                $_SESSION['ID'] = $user->ID;
                                $_SESSION['prenom'] = $user->prenom;
                                $_SESSION['email'] = $email;
                                $_SESSION['connexion'] = '1';
                                $_SESSION['changementMdp']='0'; // On met à 0 la variable de session changement mot de passe (voir changement_mdp où on a mis à 1 la variable)

                                echo "<script type='text/javascript'>document.location.replace('projects');</script>";
                                exit();
                            } else {
                                $erreurs['password'] = "Mot de passe incorrecte"; ?>
                                <div class="text_center">
                                    <?php echo "Les mots de passes ne sont pas identiques"; ?> </div><br />
                            <?php }
                        } else {
                            $erreurs['email'] = "Adresse email incorrecte"; ?>
                            <div class="text_center">
                                <?php echo "Adresse email incorrecte"; ?> </div><br />
                        <?php }
                    } else {
                        $erreurs['Error'] = "Error";
                        ?>
                        <div class="text_center">
                            <?php echo "Veuillez renseigner un mot de passe"; ?> </div><br />
                    <?php } ?>


                    <!-- "POST" et action sont importants pour tester et envoyer les différents champs dans la bdd  -->
                    <form method="POST" action="nouveau_mdp" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="inputPassword4">Mot de passe</label>
                            <input minlength="6" type="password" class="form-control" name="password" required>
                            <div class="invalid-feedback">
                                Le mot de passe doit contenir au moins 6 caractères.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4">Confirmer le mot de passe</label>
                            <input minlength="6" type="password" class="form-control" name="password2" required>
                            <div class="invalid-feedback">
                                Les mots de passes ne sont pas identiques.
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary btn_aurelien" name="ok" value="Changement mot de passe"></input>
                    </form>


                    <script>
                        //  JavaScript for disabling form submissions if there are invalid fields
                        (function() {
                            'use strict';
                            window.addEventListener('load', function() {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>

                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <?php include('footer.php'); ?>
    </footer>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>