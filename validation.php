<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '8';
?>

<!doctype html>
<html lang="fr">

<head>
    <title>Aurélien &mdash; Création site web</title>
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

                    <h2>Validation du compte </h2>
                    <br />

                    <?php
                    include('admin/config.php');

                    // Récupération des variables nécessaires à l'activation
                    $email = $_GET['email'];
                    $cle = $_GET['cle'];

                    if (!empty($_GET['email'])) {
                        $req = $bdd->prepare('SELECT cle_inscription,compte_actif FROM membres WHERE email = :email_');
                        $req->execute(
                            array(
                                'email_' => $_GET['email']
                            )
                        );

                        $user = $req->fetch(PDO::FETCH_OBJ);

                        $clebdd = $user->cle_inscription;
                        $actif = $user->compte_actif;
                    }

                    echo "actif_avant =".$actif;
                    // On teste la valeur de la variable $actif récupérée dans la BDD
                    if ($actif == '1') // Si le compte est déjà actif on prévient
                    {
                        echo "actif_après =".$actif;

                    ?>
                        <div class="text_center">
                        <?php echo "Votre compte est déjà actif, vous pouvez vous connecter"; ?> </div><br />

                        <?php
                    } else { // Si ce n'est pas le cas on passe aux comparaisons

                        if ($cle == $clebdd) // On compare nos deux clés    
                        {
                            // Si elles correspondent on active le compte !    
                            $actif = '1';
                            $req = $bdd->prepare('UPDATE membres SET compte_actif=:compte_actif_ WHERE email=:email_');
                            $req->execute(array(
                                'compte_actif_' => $actif,
                                'email_' => $_GET['email']
                            ));

                            $_SESSION['ID'] = $user->ID;
                            $_SESSION['prenom'] = $user->prenom;
                            $_SESSION['email'] = $_GET['email'];
                            $_SESSION['connexion'] = '1';

                            echo "<script type='text/javascript'>document.location.replace('projetcs.php');</script>";
                            echo "Votre compte a bien été activé !";
                            exit();
                        } else // Si les deux clés sont différentes on provoque une erreur...
                        {
                        ?> <br /><br /> <?php
                                            echo "Erreur ! Votre compte ne peut être activé...";
                                        }
                                    }
                                            ?>
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