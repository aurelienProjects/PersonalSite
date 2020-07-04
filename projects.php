<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '3';
$_SESSION['new_user'] = '0';
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


    <!--------------------------- TOAST ----------------------------- -->
    <!--     
      <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div id="element" class="toast" style="position: absolute; top: 0; right: 0;" data-delay="1000000"> 
        <div id="element" class="toast fade show" style="position: absolute; top: 11rem; right: 28.4rem; min-width:250px;" data-delay="1000000">
          <div class="toast-header">
            <img src="images/experts1.ico" class="rounded mr-2 logo_toast" alt="...">
            <strong class="mr-auto">Bienvenue ! </strong>
            <small>11 mins ago</small>
            <button type="button" name="bouton" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            Salut !
          </div>
        </div>
      </div> -->
    <!-------------------------------------------------------------------------------->

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-1" style="background-image: url('images/suivi_temperature.jpg');">
              <div class="text">
                <h3><a href="#">Contrôler et réguler la température de son habitat.</a></h3>
                <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-1" style="background-image: url('images/commandes-ouverture-volets-roulants.jpg');">
              <div class="text">
                <h3><a href="#">Contrôler ses volets.</a></h3>
                <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-1" style="background-image: url('images/camera.jpg');">
              <div class="text">
                <h3><a href="#">Surveiller à distance.</a></h3>
                <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
              </div>
            </div>

          </div>


          <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-1" style="background-image: url('images/alarmes.jpg');">
              <div class="text">
                <h3><a href="#">Recevoir les alarmes sur le téléphone portable.</a></h3>
                <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="news-1" style="background-image: url('images/panneaux-solaires-toit.jpg');">
              <div class="text">
                <h3><a href="#">État de charge de son installation photovoltaique.</a></h3>
                <a href="#" class="d-block arrow-wrap"><span class="icon-arrow_forward"></span></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
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

  <script src="https://unpkg.com/@popperjs/core@2"></script>


</body>

</html>