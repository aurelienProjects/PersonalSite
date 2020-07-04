<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '7'; // Comme la page "Se connecter"
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

					<h2>Inscription </h2>

					<br />

					<div class="font-weight-bold text-center ">
						Une adresse mail valide est nécessaire, sous peine de ne jamais reçevoir l'email d'activation.
					</div>
					<br />

					<?php
					include('admin/config.php');

					//On récupère l'adresse IP de l'utilisateur pour l'enregistrer dans la BDD
					function getIp()
					{
						if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
						else return $_SERVER['REMOTE_ADDR'];
					}


					//Si l'utilisateur a cliqué sur Valider l'inscription alors on entre dans cette fonction pour vérifier les champs et envoyer sur la BDD
					if (!empty($_POST)) {

						$erreurs = array();

						if ($_POST['nom'] != '' and $_POST['prenom'] != '' and $_POST['email'] != '') {

							if (empty($_POST['password'])) {
								$erreurs['champs'] = "Error";
								$message = "Le mot de passe n'a pas été renseigné.";
							} elseif (strlen($_POST['password']) < 6) {
								$erreurs['champs'] = "Error";
								$message = "Le mot de passe est trop court.";
							} elseif ($_POST['password'] != $_POST['password2']) {
								$erreurs['champs'] = "Error";
								?>
								<div class="text_center bold">
									<img src="images/attention_warning.ico" max width="40" max height="40" />
									Les mots de passes ne sont pas identiques.
									<br/>
								</div>
								<?php
							}
						} else {
							$erreurs['champs'] = "Error";
							$message = 'Veuillez entrer tous les champs.';
						}


						if (empty($erreurs)) {

							//Ici on vérifie que l'email n'est pas déjà existant dans la base de données
							$req = $bdd->prepare('SELECT ID FROM membres WHERE email = :email');
							$req->execute(
								array('email' => $_POST['email'])
							);

							$user = $req->fetch(PDO::FETCH_OBJ);

							if ($user) {
								$erreurs['email'] = "Error";
								$message = "L'email est déjà utilisé";
								?>
								<div class="text_center bold">
									<img src="images/attention_warning.ico" max width="40" max height="40" />
									L'email est déjà utilisé.
									<br/>
								</div>
								<?php
							} else {

								// Hashage du mdp
								$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

								// Génération aléatoire d'une clé pour la validation du compte
								$cle = md5(microtime(TRUE) * 100000);
								$ip = getIp();

								$req = $bdd->prepare('INSERT INTO membres(email,nom,prenom,password,date_inscription,adresse,ville,code_postal,date_naissance,telephone,cle_inscription,adresse_IP,newsletter,compte_actif)VALUES(:email,:nom,:prenom,:password,CURDATE(),:adresse_ville,:ville,:code_postal,:date_naissance,:telephone,:cle,:adresse_IP,:newsletter_,:compte_actif_)');
								$req->execute(array(
									'email' => $_POST['email'],
									'nom' => $_POST['nom'],
									'prenom' => $_POST['prenom'],
									'password' => $password,
									'adresse_ville' => $_POST['adresse'],
									'ville' => $_POST['ville'],
									'code_postal' => $_POST['code_postal'],
									'date_naissance' => $_POST['date_naissance'],
									'telephone' => $_POST['telephone'],
									'cle' => $cle,
									'adresse_IP' => $ip,
									'newsletter_' => '0',
									'compte_actif_' => '0'

								));

								// ---------------- ENVOI D'UN MAIL DE CONFIRMATION ------------------------ //
								include("envoi_mail_confirmation.php");
								if (isset($_POST['email'])) {
									envoi($_POST['email'], $cle);
								}

								// -------------------------------------------------------------------------- //

								echo "<script type='text/javascript'>document.location.replace('connexion');</script>";
								echo "Veuillez vous connecter";
								$_SESSION['new_user'] = '1';

								exit();
							}
						} else {
							echo '<div class="message">' . $message . '</div>';
						}
					}

					?>

					<!-- "POST" et action sont importants pour tester et envoyer les différents champs dans la bdd  -->
					<form method="POST" action="inscription" class="needs-validation" novalidate>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputNom">Nom</label>

								<input type="text" class="form-control" name="nom" value="<?php if (isset($_POST['nom'])) {
																								echo $_POST['nom'];
																							} ?>" required>
								<div class="invalid-feedback">
									Renseigner votre nom.
								</div>
							</div>
							<div class="form-group col-md-6">
								<label for="inputPrenom">Prénom</label>
								<input type="text" class="form-control" name="prenom" value="<?php if (isset($_POST['prenom'])) {
																									echo $_POST['prenom'];
																								} ?>" required>
								<div class="invalid-feedback">
									Renseigner votre prénom.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputTelephone">Téléphone</label>
							<input type="text" class="form-control" pattern="^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$" name="telephone" value="<?php if (isset($_POST['telephone'])) {
																																				echo $_POST['telephone'];
																																			} ?>" required>
							<div class="invalid-feedback">
								Renseigner votre téléphone.
							</div>
							<!-- [0-9] indique un nombre entre 0 et 9.
							[0-9]{2} indique que nous voulons deux nombres entre 0 et 9.
							([0-9]{2} ) indique que nous voulons deux nombres entre 0 et 9, avec un espace à la fin.
							([0-9]{2} ){4} indique que nous voulons 4 fois "deux nombres entre 0 et 9 avec un espace à la fin". -->
						</div>
						<div class="form-group">
							<label for="inputNaissance">Date de naissance</label>
							<input type="date" class="form-control" name="date_naissance" value="<?php if (isset($_POST['date_naissance'])) {
																										echo $_POST['date_naissance'];
																									} ?>" required> <!-- value=".." permet de récupérer les champs renseingés par l'utilisateur en cas d'une erreur dans la saisie -->
							<div class="invalid-feedback">
								Renseigner votre date de naissance.
							</div>
						</div>
						<div class="form-group">
							<label for="input-email">Email</label>
							<input id="input-email" type="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="form-control" name="email" value="<?php if (isset($_POST['email']) && !isset($erreurs['email'])) {
																																					echo $_POST['email'];
																																				} else { echo ""; } ?>" required>
							<div class="invalid-feedback">
								Renseigner une adresse mail valide.
							</div>
						</div>

						<div class="form-group">
							<label for="inputAddress">Adresse</label>
							<input type="text" class="form-control" id="inputAddress" name="adresse" value="<?php if (isset($_POST['adresse'])) {
																												echo $_POST['adresse'];
																											} ?>" required>
							<div class="invalid-feedback">
								Renseigner votre adresse.
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">Ville</label>
								<input type="text" class="form-control" id="inputCity" name="ville" value="<?php if (isset($_POST['ville'])) {
																												echo $_POST['ville'];
																											} ?>" required>
								<div class="invalid-feedback">
									Renseigner votre ville.
								</div>
							</div>
							<div class="form-group col-md-4">
								<label for="inputZip">Code postal</label>
								<input type="text" class="form-control" id="inputZip" name="code_postal" value="<?php if (isset($_POST['code_postal'])) {
																													echo $_POST['code_postal'];
																												} ?>" required>
								<div class="invalid-feedback">
									Renseigner votre code postal.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword4">Mot de passe</label>
							<input minlength="6" type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" name="password" required>
							<div class="invalid-feedback">
								Le mot de passe doit contenir au moins 6 caractères, une majuscule et un chiffre.
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword4">Confirmer le mot de passe</label>
							<input type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$" name="password2" required>
							<div class="invalid-feedback">
								Les mots de passes ne sont pas identiques.
							</div>
						</div>

						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck" name="auto_connect">
								<label class="form-check-label" for="gridCheck">
									Se souvenir de moi
								</label>
							</div>
						</div>
						<input type="submit" class="btn btn-primary btn_aurelien" name="ok" value="Inscription"></input>
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