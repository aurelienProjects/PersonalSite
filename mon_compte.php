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

        <h2>Mon compte</h2>

        <br />

        <div class="row">

          <!----------------------------------------------------------- 1ère colonne ------------------------------------------------------------------------------------------->
          <div class="col-md-6 font-size-account ">

            <?php include('admin/config.php'); ?>

            <form>

              <!------------------------------ Prénom ------------------------------->
              <div class="form-group">
                Prénom :
                <input class="form-control" type="text" value="<?php if (isset($_SESSION['ID']) and isset($_SESSION['prenom'])) {
                                                                  echo $_SESSION['prenom'];
                                                                } ?>" readonly>
              </div>

              <!--------------------------------  Telephone ----------------------->
              <div class="form-group">
                Téléphone :
                <?php
                if (isset($_SESSION['ID'])) {
                  $num_session = $_SESSION['ID'];

                  // On récupère tout le contenu de la table
                  $mon_compte = $bdd->query("SELECT telephone from membres where (ID = $num_session)");

                  // On affiche chaque entrée une à une
                  while ($donnees = $mon_compte->fetch()) {
                    $tel = trim($donnees['telephone']);
                  }
                  $mon_compte->closeCursor();
                }
                ?>
                <input class="form-control" type="text" value="<?php echo $tel ?>" readonly>

              </div>

              <?php echo $donnees['telephone']; ?>

              <!------------------------------ Email  -------------------------------->
              <div class="form-group">
                Email :
                <?php
                if ($_SESSION['ID']) {
                  $num_session = $_SESSION['ID'];

                  // On récupère tout le contenu de la table
                  $mon_compte = $bdd->query("SELECT email from membres where (ID = $num_session)");

                  // On affiche chaque entrée une à une
                  while ($donnees = $mon_compte->fetch()) {
                    $mail = trim($donnees['email']);
                  }
                  $mon_compte->closeCursor();
                }
                ?>
                <input class="form-control" type="text" value="<?php echo $mail ?>" readonly>
              </div>

              <br />

              <!------------------------------ Changement Mot de passe  -------------------------------->

              <?php
              include('admin/config.php');


              //Si l'utilisateur a cliqué sur le bouton valider pour changer de mot de passe alors on entre dans cette fonction pour vérifier les champs et envoyer sur la BDD
              if (!empty($_POST) && !empty($_POST['password']) && !empty($_POST['password2'])) {

                //Ici on vérifie que l'ancien mot de passe est bien correcte
                $req = $bdd->prepare('SELECT ID,password FROM membres WHERE email = :email');
                $req->execute(
                  array('email' => $_SESSION['email'])
                );

                $user = $req->fetch(PDO::FETCH_OBJ);

                if ($user && password_verify($_POST['password'], $user->password)) {

                  // Hashage du mdp
                  $password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

                  $req = $bdd->prepare('UPDATE membres SET password=:password_ WHERE email=:email_');
                  $req->execute(array(
                    'password_' => $_POST['newPassword'],
                    'email_' => $_SESSION['email']
                  ));


                  // echo "<script type='text/javascript'>document.location.replace('mon_compte');</script>";

                } else {                 ?>
                  <div class="text_center bold">
                    <img src="images/attention_warning.ico" max width="40" max height="40" />
                    Le mot de passe est incorrect.
                    <br />
                  </div>
              <?php }
              }


              ?>

              <form method="POST" action="mon_compte" class="needs-validation" novalidate>

                <div class="form-group">
                  <label for="inputPassword3" class="bloc_mdp_mon_compte col-form-label">Mot de passe actuel :</label>
                  <div class="bloc_mdp_mon_compte">
                    <input type="password" class="form-control" id="inputPassword3" name="password" require>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="bloc_mdp_mon_compte col-form-label">Nouveau mot de passe :</label>
                  <div class="bloc_mdp_mon_compte">
                    <input type="password" class="form-control" id="inputPassword3" name="newPassword">
                  </div>
                </div>

                <div>
                  <input type="submit" name="ok" value="Changer mot de passe" class="btn btn-primary btn_aurelien">
                  <br />
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
              <!------------------- Ajout d'un nouvel avatar ---------------------------->

            </form>
            <br />

          </div>

          <!----------------------------------------------------------- 2ème colonne ------------------------------------------------------------------------------------------->

          <div class="col-md-6 font-size-account">

            <!-- Ajout d'un avatar -->
            <?php
            include("transfert-image.php");
            if (isset($_FILES['fic'])) {
              transfert();
            }
            ?>

            <form enctype="multipart/form-data" action="#" method="POST">
              <div class="form-group">
                <label for="exampleFormControlFile1"> Ajouter un avatar :</label>
                <br />
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                <input class="choix_fichier" type="file" name="fic" size=50 class="form-control-file" id="exampleFormControlFile1">
                <br /><br />
                <input class="btn btn-primary btn_aurelien" type="submit" value="Envoyer" />
              </div>
            </form>


            <!-------------------------------- Avatar ------------------------->
            <!---- On affiche l'avatar si l'utilisateur a déjà rentré une photo --->
            <?php

            //On récupère tout le contenu de la table
            if (isset($_SESSION['ID'])) {
              $session = $_SESSION['ID'];
              $mon_compte = $bdd->query("SELECT img_nom, img_id,img_type,adresse FROM images WHERE (Session_ID = $session)");

              while ($donnees = $mon_compte->fetch()) {
                $Id_Picture = "images_utilisateurs/" . $donnees['img_nom'];
            ?>
                <img src=<?php echo $Id_Picture ?> max height="400" max width="300" class="image_centre" alt="Id Picture" title="Id_Portrait" style="float:center;" />
            <?php
              }
              $mon_compte->closeCursor();
            }

            ?>



            <br />

          </div>
        </div>
      </div>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------->
    </div>

    <footer class="site-footer">
      <?php include('footer.php'); ?>
    </footer>

  </div>



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