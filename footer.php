<!doctype html>
<html lang="fr">


<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <h2 class="footer-heading mb-3">À propos de nous</h2>
      <p class="mb-5">Ce site web est un site modèle.</p>

      <h2 class="footer-heading mb-4">Newsletter</h2>

      <!------------ ICI on vérifie que l'utilisateur est bien connecté pour demander la newsletter    ---------->
      <!--- Si l'utilisateur est connecté alors on renseigne dans la BDD veut la newsletter sinon on lui demande de se connecter -->
      <?php
      if (!empty($_POST) && !empty($_POST['email_newsletter'])) {
        if ($_SESSION['connexion'] == '1') {

          include('admin/config.php');

          $req = $bdd->prepare('SELECT email,newsletter FROM membres WHERE ID = :ID_');
          $req->execute(
            array(
              'ID_' => $_SESSION['ID']
            )
          );
          $user = $req->fetch(PDO::FETCH_OBJ);
          $newsletterValue = $user->newsletter;
          echo $newsletterValue;

          if ($user && $newsletterValue == '0') {
            echo 'rentrer ici';
            $req = $bdd->prepare('UPDATE membres SET newsletter=:newsletter_ WHERE ID=:ID_');
            $req->execute(array(
              'ID_' => $_SESSION['ID'],
              'newsletter_' => '1'
            ));

            // ---------------- ENVOI D'UN MAIL DE CONFIRMATION DE LA DEMANDE DE NEWSLETTER------------------------ //

            // Préparation du mail contenant la prise en compte de la demande de newsletter
            $destinataire = $_POST['email_newsletter'];
            $sujet = utf8_decode("CONFIRMATION DE L'INSCRIPTION À LA NEWSLETTER");
            $entete = "From: aurelien@aurelien-projetcs.com";

            // NE PAS TABULER LE TEXTE CI-DESSOUS (sinon cela changera l'aperçu du mail reçu par l'utilisateur)
            $message = utf8_decode("Votre demande d'inscription à la newsletter d'AurelienWebsite a bien été prise en compte.,
 
Vous ne pourrez plus passer à côté de nos nouveaux projets ! 
Dans l'impatience de vous revoir parmis nous,
													

Aurélien Website
							
---------------------------------------------------------
Ceci est un mail automatique, merci de ne pas y repondre.");


            mail($destinataire, $sujet, $message, $entete); // Envoi du mail

            // ----------------------------------------------------------------------------------------------------------- //


            //echo "<script type='text/javascript'>document.location.reload();</script>";
          } else {
            echo "Vous êtes déja abonné à la newsletter";
          }
        } else {
          //echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";
        }
      }

      ?>

      <!--------------------------------------------------------------------------------------------------------------------------------->

      <form action="#" method="POST" class="needs-validation" novalidate>
        <div class="form-group">
          <input type="text" class="form-control mr-3" placeholder="Email" name="email_newsletter" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
          <div class="invalid-feedback">
            Renseigner une adresse mail valide.
          </div>
        </div>
        <input type="submit" value="Envoyer" class="btn btn-primary btn_aurelien">


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
    <br />
    <div class="col-lg-8 ml-auto">
      <div class="row bloc_newsletter">
        <div>
          <br />
        </div>
        <div class="col-lg-4 ml-auto">
          <h2 class="footer-heading mb-4">À propos</h2>
          <ul class="list-unstyled">
            <li><a href="#">Centre d'aide</a></li>
            <li><a href="contact">Nous contacter</a></li>
            <li><a href="#">Mentions légales</a></li>
          </ul>
        </div>

        <div class="col-lg-4">
          <h2 class="footer-heading mb-4">Navigation</h2>
          <ul class="list-unstyled">
            <li><a href="projects">Nos projets</a></li>
            <li><a href="#">Conditions générales</a></li>
            <li><a href="cookies">Cookies</a></li>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <div class="row pt-5 mt-5 text-center">
    <div class="col-md-12">
      <div class="border-top pt-5">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> Tous droits réservés
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>

  </div>
</div>