<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '6';
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

          <h2>Nous contacter</h2>
        </div>

        <?php
        if (!empty($_POST)) {

          if (!empty($_POST['email']) && !empty($_POST['message'] && $compteur != '1')) {

            // ---------------- ENVOI DU MAIL POUR UNE DEMANDE DE RENSEIGNEMENT ------------------------ //

            // Préparation du mail contenant le lien d'activation
            $destinataire = "aurelien@aurelien-projetcs.com";
            $sujet = "Contact utilisateur SiteWeb";
            $entete = "From:" . $_POST['email'];
            $compteur = '1';
            $message = utf8_decode($_POST['message']);
            mail($destinataire, $sujet, $message, $entete); // Envoi du mail
          }

          // -------------------------------------------------------------------------- //
        }

        ?>



        <div class="row">
          <div class="col-lg-8 mb-5">

            <form action="contact" method="POST" class="needs-validation" novalidate>
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <label for="inputPrenom">Prénom</label>
                  <input type="text" class="form-control" name="prenom" required>
                  <div class="invalid-feedback">
                    Renseigner votre prénom.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="inputNom">Nom</label>
                  <input type="text" class="form-control" name="nom" required>
                  <div class="invalid-feedback">
                    Renseigner votre nom.
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="input-email">Email</label>
                  <input id="input-email" type="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="form-control" name="email" required>
                  <div class="invalid-feedback">
                    Renseigner une adresse mail valide.
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="input-message">Message</label>
                  <textarea name="message" id="input-message" class="form-control" placeholder="Écrire un message..." cols="30" rows="10" required></textarea>
                  <div class="invalid-feedback">
                    Écrire un message.
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto btn_aurelien">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Envoyer">
                </div>
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


          <div class="col-lg-4 ml-auto bloc_contact">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Contact</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Adresse :</span>
                  <span>23 Cours Gambetta, Montpellier, France</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Téléphone :</span><span>+1 242 4942 290</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email :</span><span>aurelien@aurelien-projetcs.com</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
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