<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '7';
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
                    <h2>Connexion</h2>

                    <br />

                    <?php
                    include('admin/config.php');
                    if (!empty($_POST)) {
                        if (!empty($_POST['email'])  && !empty($_POST['password'])) {

                            $req = $bdd->prepare('SELECT ID,prenom,password,compte_actif FROM membres WHERE email = :email');
                            $req->execute(
                                array(
                                    'email' => $_POST['email']
                                )
                            );
                            $user = $req->fetch(PDO::FETCH_OBJ);

                            // On vérifie que le compte de l'utilisateur est bien actif
                            if ($user->compte_actif == '1') {

                                // On vérifie que le mot de passe est bien correcte et que l'email est bien existant dans la bdd
                                if ($user && password_verify($_POST['password'], $user->password)) {
                                    $_SESSION['erreurMdp'] = '0';
                                    $_SESSION['ID'] = $user->ID;
                                    $_SESSION['prenom'] = $user->prenom;
                                    $_SESSION['email'] = $_POST['email'];
                                    $_SESSION['connexion'] = '1';

                    ?>

                                    <script type="text/javascript">
                                        localStorage.setItem('connexion', 'true');
                                    </script>

                                <?php
                                    // On incrémente le nombre de connexion de l'ensemble des utilisateurs
                                    $req = $bdd->prepare('SELECT nbre_connexion FROM stat_membres WHERE ID=:ID_');
                                    $req->execute(
                                        array(
                                            'ID_' => '1'
                                        )
                                    );
                                    $user = $req->fetch(PDO::FETCH_OBJ);
                                    $compteur_connexion = $user->nbre_visiteurs + '1';

                                    $req_insert = $bdd->prepare('UPDATE stat_membres SET nbre_connexion=:compteur_user_ WHERE ID=:ID_');
                                    $req_insert->execute(
                                        array(
                                            'compteur_user_' => $compteur_connexion,
                                            'ID_' => '1'
                                        )
                                    );

                                    echo 'Vous êtes connecté !';
                                    echo $user->prenom;
                                    echo "<script type='text/javascript'>document.location.replace('projects');</script>";
                                    exit();
                                } else { ?>
                                    <div class="text_center">
                                        <?php echo "Email ou mot de passe incorrect";
                                        $_SESSION['erreurForm'] = '1';
                                        ?> </div><br />
                                <?php
                                }
                            } else {
                                ?>
                                <div class="text_center">
                                    <?php echo "Votre compte n'est pas activé, cliquer sur le lien envoyé sur votre boîte mail";
                                    $_SESSION['erreurForm'] = '2';
                                    ?> </div><br />

                            <?php
                            }
                        } else { ?>

                            <div class="text_center">
                                <?php echo "Veuillez remplir tous les champs"; ?> </div><br />
                    <?php }
                    } ?>

                    <!------ On regarde si c'est un un nouvel utilisateur, 'new_user' passe à 1 dans le fichier inscription -------->
                    <?php
                    if ($_SESSION['new_user'] == '1') {
                    ?>
                        <div class="text_center bold">
                            <?php echo "Un email de validation a été envoyé dans votre boîte de réception, cliquer sur le lien qu'il contient."; ?> </div>
                        <div class="text_center bold">
                            <img src="images/attention_warning.ico" max width="40" max height="40" />
                            <?php echo "Le mail peut se trouver dans votre boite mail indésirable."; ?> </div><br />
                    <?php } else if ($_SESSION['changementMdp'] == '1') { ?>
                        <div class="text_center bold">
                            <?php echo "Un email a été envoyé dans votre boîte de réception, cliquer sur le lien qu'il contient pour réinitialiser votre mot de passe."; ?> </div>
                        <div class="text_center bold">
                            <img src="images/attention_warning.ico" max width="40" max height="40" />
                            <?php echo "Le mail peut se trouver dans votre boite mail indésirable."; ?> </div><br />
                    <?php } else {} ?>
                    <!--------------------------------------------------------------------------------------------------------------->


                    <form method="POST" action="connexion.php" class="needs-validation" novalidate>
                        <div class="form-group row">
                            <label for="input-email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="input-email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" required>
                            </div>
                            <div class="invalid-feedback">
                                Ce champ est requis.
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Mot de passe</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" name="password" required>
                            </div>
                            <div class="invalid-feedback">
                                Ce champ est requis.
                            </div>
                        </div>

                        <div class="btn_aurelien">
                            <input type="submit" name="ok" value="Connexion" class="btn btn-primary">
                            <br /><br />
                            <a href="changement_mdp">Mot de passe oublié</a>
                            <br /><br />
                            <a href="inscription" class="bold">S'inscrire</a>
                        </div>
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