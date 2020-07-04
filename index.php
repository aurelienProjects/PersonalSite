<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '1';
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
        <div class="row justify-content-center text-center">
          <div class="col-md-7 mb-5">
            <h2>Des idées créatives pour être au plus proche de la transformation digitale</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="feature-1">
              <span class="wrap-icon">
                <span class="icon-home"></span>
              </span>
              <h3>L'apport d'une maison connectée</h3>
              <p>Du contrôle de sa consommation énergétique à la surveillance de votre maison, une maison connectée permet de réaliser des économies et d'apporter une sécurité garantie.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="feature-1">
              <span class="wrap-icon">
                <span class="icon-face"></span>
              </span>
              <h3>La surveillance de ses proches les plus vulnérables</h3>
              <p>Grâce à différents types de capteurs et moyen de surveillance, vous pourrez laisser vos proches en toute tranquillité.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="feature-1">
              <span class="wrap-icon">
                <span class="icon-drafts"></span>
              </span>
              <h3>L'envoi d'alertes suite à une détection</h3>
              <p>En configurant des envois d'alertes suite à une détection d'un changement de statut, vous n'aurez plus à vous soucier de votre habitat.</p>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 text-center">
            <a href="projects" class="btn btn-primary">Voir tous les services</a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h2>Les accessoires électroniques utilisés</h2>
            <p>Les projets sont réalisés à partir de différentes cartes électronique comme Arduino, Raspberry ..</p>

            <div class="d-flex align-items-center">
              <div>
                <span class="d-block font-weight-bold">Mr. Aurélien D</span>
                <span>CEO</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 ml-auto">
            <h2 class="h5 mb-4">Notre expertise et notre qualité</h2>

            <div class="progress-wrap mb-4">
              <div class="d-flex">
                <span>Commercial</span>
                <span class="ml-auto">55%</span>
              </div>
              <div class="progress rounded-0" style="height: 7px;">
                <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress-wrap mb-4">
              <div class="d-flex">
                <span>Logiciel</span>
                <span class="ml-auto">85%</span>
              </div>
              <div class="progress rounded-0" style="height: 7px;">
                <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress-wrap mb-4">
              <div class="d-flex">
                <span>Web</span>
                <span class="ml-auto">93%</span>
              </div>
              <div class="progress rounded-0" style="height: 7px;">
                <div class="progress-bar" role="progressbar" style="width: 93%;" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress-wrap mb-4">
              <div class="d-flex">
                <span>Électronique</span>
                <span class="ml-auto">83%</span>
              </div>
              <div class="progress rounded-0" style="height: 7px;">
                <div class="progress-bar" role="progressbar" style="width: 83%;" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_2.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-7 text-center mb-5">
            <h2 class="text-white">Tenez-vous prêt à être au plus prêt de la transformation digitale</h2>
          </div>
        </div>

      </div>
    </div>

    <div class="site-section counter-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="d-flex align-items-center counter">
              <span class="icon-building-o wrap-icon mr-3"></span>
              <div class="text">
                <span class="d-block number">2k</span>
                <span class="caption">logiciels</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="d-flex align-items-center counter">
              <span class="icon-home2 wrap-icon mr-3"></span>
              <div class="text">
                <span class="d-block number">3</span>
                <span class="caption">bureaux</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="d-flex align-items-center counter">
              <span class="icon-code wrap-icon mr-3"></span>
              <div class="text">
                <span class="d-block number">3920k</span>
                <span class="caption">lignes de codes</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 text-center">
            <h3 class="section-heading text-center">Nouveautés &amp; Événements</h3>
            <p class="mb-5 lead">Voir les dernières réalisations !</p>

          </div>

        </div>
        <div class="row">
          <div class="col-12">

            <div class="nonloop-block-13 owl-carousel">

              <div class="news-1" style="background-image: url('images/suivi_temperature.jpg');">
                <div class="text">
                  <h3><a href="#">Contrôler et réguler la température de son habitat.</a></h3>
                  <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
                </div>
              </div>

              <div class="news-1" style="background-image: url('images/commandes-ouverture-volets-roulants.jpg');">
                <div class="text">
                  <h3><a href="#">Contrôler ses volets.</a></h3>
                  <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
                </div>
              </div>

              <div class="news-1" style="background-image: url('images/camera.jpg');">
                <div class="text">
                  <h3><a href="#">Surveiller à distance.</a></h3>
                  <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
                </div>
              </div>


              <div class="news-1" style="background-image: url('images/alarmes.jpg');">
                <div class="text">
                  <h3><a href="#">Recevoir les alarmes sur le téléphone portable.</a></h3>
                  <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
                </div>
              </div>

              <div class="news-1" style="background-image: url('images/panneaux-solaires-toit.jpg');">
                <div class="text">
                  <h3><a href="#">Etat de charge de son installation photovoltaique. </a></h3>
                  <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
                </div>
              </div>

              <div class="news-1" style="background-image: url('images/img_2.jpg');">
                <div class="text">
                  <h3><a href="#">Autres projets..</a></h3>
                  <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg');">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2 class="text-white section-heading primary-color-icon text-center">Services qualités</h2>
          <p class="lead text-white mb-5"> Nos clients sont au coeur de nos préoccupations. Voilà la garantie d'un partenaire sur qui vous pouvez compter.</p>
          <p><a href="contact" class="btn btn-primary">Nous contacter</a></p>
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

  <script src="https://unpkg.com/@popperjs/core@2"></script>

  <script src="js/main.js"></script>

</body>

</html>