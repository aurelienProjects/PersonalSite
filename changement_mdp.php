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
                    <h2>Mot de passe oublié</h2>

                    <br/>

                    <?php
                    include('admin/config.php');

                    if (!empty($_POST['email'])) {

                        $erreurs = array();

                        // Génération aléatoire d'une clé pour la validation du compte
                        $new_cle = md5(microtime(TRUE) * 100000);
                        
                        $req = $bdd->prepare('SELECT ID FROM membres WHERE email = :email');
                        $req->execute(
                            array(
                                'email' => $_POST['email']
                            )
                        );

                        $user = $req->fetch(PDO::FETCH_OBJ);
                        $resultat = $req->fetch();


                        if ($user) {


                            $req = $bdd->prepare('UPDATE membres SET cle_inscription=:cle_inscription_ WHERE email=:email_');
                            $req->execute(array(
                                'cle_inscription_' => $new_cle,
                                'email_' => $_POST['email']
                            ));

                            // ---------------- ENVOI D'UN MAIL DE CONFIRMATION ------------------------ //

                            // Préparation du mail contenant le lien d'activation
                            $destinataire = $_POST['email'];
                            $sujet = utf8_decode('Réinitialisation mot de passe');
                            $entete = "From: aurelien@aurelien-projetcs.com";
                            $cle='1';
                            // NE PAS TABULER LE TEXTE CI-DESSOUS (sinon cela changera l'aperçu du mail reçu par l'utilisateur)
                            $message = utf8_decode('Bienvenue sur Aurélien Website,
 
Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur Internet.
								
https://aurelien-projetcs.com/nouveau_mdp.php?email=' . urlencode($_POST['email']) . '&cle=' . urlencode($cle) . '								


Aurélien Website
							
---------------------------------------------------------
Ceci est un mail automatique, merci de ne pas y repondre.');


                            mail($destinataire, $sujet, $message, $entete); // Envoi du mail
                            $_SESSION['changementMdp']='1';
                            echo "<script type='text/javascript'>document.location.replace('connexion');</script>";
                            exit();
                        } else {
                            $erreurs['email'] = "Adresse email incorrecte";

                    ?>

                            <div class="text_center">
                                <?php echo "Adresse email incorrecte"; ?> </div><br />

                        <?php
                        }
                    } else {
                        $erreurs['Error'] = "Error";
                        ?>

                        <div>
                            <?php echo "Veuillez renseigner votre adresse email"; ?> </div><br />
                    <?php } ?>


                    <form method="POST" action="changement_mdp">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" name="email">
                            </div>
                        </div>
                        <div class="btn_aurelien">
                            <input type="submit" name="ok" value="Connexion" class="btn btn-primary">
                        </div>
                    </form>
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