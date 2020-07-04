<?php

// setcookie("Visite", "ok", time() + 365 * 24 * 3600, null, null, false, true);
// Si pas de COOKIE...
if (!isset($_SESSION)) {  // rentre dans la condition si COOKIE visiteurs n'existe pas
  setcookie('visiteurs', 'ok', time() * 3600, null, null, false, true);


  $_COOKIE['visiteurs'] = 'ok';
  //  incremente in database
  // On récupère tout le contenu de la table

  include('admin/config.php');

  $req = $bdd->prepare('SELECT nbre_visiteurs FROM stat_membres WHERE ID=:ID_');
  $req->execute(
    array(
      'ID_' => '1'
    )
  );
  $user = $req->fetch(PDO::FETCH_OBJ);
  $compteur_user = $user->nbre_visiteurs + '1';
  echo "user=" . $compteur_user;

  $req_insert = $bdd->prepare('UPDATE stat_membres SET nbre_visiteurs=:compteur_user_ WHERE ID=:ID_');
  $req_insert->execute(
    array(
      'compteur_user_' => $compteur_user,
      'ID_' => '1'
    )
  );
}


?>

<script src="js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var cookie_session = localStorage.getItem('cookie');
    console.log(cookie_session);

    if (!cookie_session) {
      document.getElementById("a_masquer").style.display = 'block';
    }
  });

  function masquer_div() {
    localStorage.setItem('cookie', true);
  }
</script>



<div class="container mb-3">
  <div class="d-flex align-items-center">
    <div class="site-logo mr-auto">
      <a href="index">Aurélien Website<span class="text-primary">.</span></a>
    </div>
    <div class="site-quick-contact d-none d-lg-flex ml-auto ">
      <div class="d-flex site-info align-items-center mr-5">
        <span class="block-icon mr-3"><span class="icon-map-marker"></span></span>
        <span>23 Cours Gambetta, Montpellier, <br> France</span>
      </div>
      <div class="d-flex site-info align-items-center">
        <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
        <span>Lundi - Vendredi 8:00 - 18:00</span>
      </div>

    </div>
  </div>
</div>

<!----------------------- Utilisation des cookies, information à l'utilisateur -------------------------->
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="a_masquer" onload="checkCookies()" style="display: none">
  Ce site web utilise des cookies pour vous offrir une meilleure expérience et également pour vous montrer des publicités personnalisées. En utilisant ce site, vous acceptez leur utilisation.
  <a href="cookies">Voir notre Politique relative aux cookies. </a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="masquer_div()">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!--- ------------------------------------------------------------------------------------------------->

<div class="container">
  <div class="menu-wrap d-flex align-items-center">
    <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>

    <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
      <ul class="site-menu main-menu js-clone-nav mr-auto ">

        <?php
        if (isset($_SESSION['page'])) {

          if ($_SESSION['page'] == '1') { ?>
            <li class="active">
            <?php } else { ?>
            <li>
          <?php }
        }  ?>
          <a href="index" class="nav-link">Accueil</a></li>


            <?php
            if (isset($_SESSION['page'])) {

              if ($_SESSION['page'] == '3') { ?>
                <li class="active">
                <?php } else { ?>

                <li>
              <?php }
            }  ?>
              <a href="projects" class="nav-link">Projets</a></li>


                <?php
                if (isset($_SESSION['page'])) {

                  if ($_SESSION['page'] == '6') { ?>
                    <li class="active">
                    <?php } else { ?>

                    <li>
                  <?php }
                }  ?>
                  <a href="contact" class="nav-link">Contact</a></li>

                    <?php
                    if (isset($_SESSION['connexion'])) { ?>

                      <?php
                      if (isset($_SESSION['page'])) {

                        if ($_SESSION['page'] == '8') { ?>
                          <li class="active">
                          <?php } else { ?>

                          <li>
                        <?php }
                      }  ?>
                        <a href="mon_compte">Mon compte</a></li>

                          <li class="font-size-16">
                            <a href="deconnexion"> Deconnexion</a>
                          </li>

                        <?php } else { ?>
                          <?php
                          if (isset($_SESSION['page'])) {

                            if ($_SESSION['page'] == '7') { ?>
                              <li class="active">
                              <?php } else { ?>
                              <li>

                            <?php }
                          }  ?>
                            <a href="connexion">Se connecter</a>
                              </li>
                            <?php }
                            ?>

      </ul>

    </nav>

    <div class="top-social ml-auto">
      <a href="https://www.facebook.com/aurelien.dyla"><span class="icon-facebook"></span></a>
      <!--<a href="#"><span class="icon-twitter"></span></a>-->
      <a href="https://www.linkedin.com/in/aur%C3%A9lien-dyla-34000/"><span class="icon-linkedin"></span></a>
    </div>
  </div>


  <!------------------------ TOAST pour dire bienvenue à l'utilisateur suite à une connexion ----------------->

  <script src="js/jquery-3.3.1.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      var toastSession = localStorage.getItem('toastBlock');
      var connexionSession = localStorage.getItem('connexion');
      console.log("connexion = " + connexionSession);
      console.log(typeof connexionSession);    // string
      console.log("toastSession = " + toastSession);
      console.log(typeof toastSession);    // string


      if (toastSession == 'true') {
        $('#element').toast('hide');
      } else if (connexionSession != 'true'){
        $('#element').toast('hide');
      }
      else {
        document.getElementById("element").style.display = 'block';
        $('#element').toast('show');
      }
    });

    function masquerToast() {
      localStorage.setItem('toastBlock', 'true');
    }
  </script>

  <div class="toast" id="element" role="alert" aria-live="assertive" aria-atomic="true" onload="checkToast()" style="display: none; margin-top: 10px" data-autohide="false">
    <div class="toast-header">
      <strong class="mr-auto">Bienvenue ! <?php echo $_SESSION['prenom']; ?></strong>
      <small><? //php if(isset($_SESSION['prenom'])) { echo $_SESSION['prenom']; } 
              ?></small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="masquerToast()">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Content de te voir parmis nous !
    </div>
  </div>
  <!---------------------------------------------------------------------------------------------------------->

</div>