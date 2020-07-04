<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '10';
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
                    <h2>Politique relative aux cookies</h2>
                </div>


                <div class="bold">Définition de « cookie » et son utilisation.</div>
                <p>
                    Un « cookie » est un fichier texte déposé sur votre ordinateur lors de la visite de notre plateforme. Dans votre ordinateur, les cookies sont gérés par votre navigateur internet.
                </p>
                <p>
                    Nous utilisons des cookies sur notre Site pour les besoins de votre navigation, l'optimisation et la personnalisation de nos Services sur notre plateforme en mémorisant vos préférences. Les cookies nous permettent aussi de voir comment notre plateforme est utilisée. Nous recueillons automatiquement votre adresse IP et des informations relatives à l'utilisation de notre Site. Notre plateforme peut ainsi se souvenir de votre identité lorsqu'une connexion a été établie entre le serveur et le navigateur web. Les informations fournies précédemment dans un formulaire web pourront ainsi être conservées.
                </p>

                <br />

                <div class="bold">Différents types de cookies sont utilisés sur notre Site :</div>
                <ul>
                    <li>
                        <p>
                            Des cookies qui sont strictement nécessaires au fonctionnement de notre plateforme (cookies obligatoires). Ils vous permettent d'utiliser les principales fonctionnalités de notre plateforme. Sans ces cookies, vous ne pourrez pas utiliser notre plateforme normalement.
                        </p>
                    </li>
                    <li>
                        <p>
                            Des cookies fonctionnels, parmis lesquels des cookies dits "analytiques" :
                            <p>
                                Afin d'améliorer nos services, nous utilisons des cookies de mesures d'audience telles que le nombre de pages vues, le nombre de visites, l'activité des Utilisateurs et leur fréquence de retour, notamment grâce aux services de Google Analytics. Ces cookies permettent seulement l'établissement d'études statistiques sur le trafic des Utilisateurs sur notre plateforme, dont les résultats sont totalement anonymes pour nous permettre de connaître l'utilisation et les performances de notre plateforme et d'en améliorer le fonctionnement. Accepter ces cookies permet une utilisation optimale de notre plateforme, si vous les refusez, nous ne pouvons vous garantir une utilisation normale sur notre plateforme.
                            </p>
                        </p>
                        <p>
                            Cela inclut aussi des cookies qui nous permettent de personnaliser votre expérience sur notre plateforme en mémorisant vos préférences (comme les cookies de partage de sites de médias sociaux). Ces cookies peuvent être placés par une tierce partie pour notre compte, mais elle n'est pas autorisée à les utiliser à d'autres fins que celles décrite.
                        </p>
                    </li>
                </ul>
                <p>
                    Types de cookies utilisés. Les types de cookies suivants sont utilisés sur ce Site :
                </p>
                <ul>
                    <li>
                        <p>
                            Cookies "temporaires" : ce type de cookie est actif dans votre navigateur jusqu'à ce que vous quittiez notre plateforme et expire si vous n'accédez pas au Site pendant une certaine période donnée.
                        </p>
                    </li>
                    <li>
                        <p>
                            Cookies "permanents" ou "traceurs" : ce type de cookie reste dans le fichier de cookies de votre navigateur pendant une période plus longue, qui dépend des paramètres de votre navigateur web. Les cookies permanents sont également appelés cookies traceurs.
                        </p>
                    </li>
                </ul>

                <br />

                <div class="bold">
                    Utilisation des cookies de tiers.
                </div>
                <p>
                    Nous pouvons recourir à des partenaires tiers, tels que Google Analytics, pour suivre l'activité des visiteurs de notre plateforme ou afin d'identifier vos centres d'intérêt sur notre plateforme et personnaliser l'offre qui vous est adressée sur notre plateforme ou en dehors de notre plateforme. Les informations pouvant ainsi être collectées par des annonceurs tiers peuvent inclure des données telles que des données de géo-localisation ou des informations de contact, comme des adresses électroniques. Les politiques de confidentialité de ces annonceurs tiers fournissent des informations supplémentaires sur la manière dont les cookies sont utilisés.
                </p>
                <p>
                    Nous veillons à ce que les sociétés partenaires acceptent de traiter les informations collectées sur notre plateforme exclusivement pour nos besoins et conformément à nos instructions, dans le respect de la réglementation européenne et s'engagent à mettre en œuvre des mesures appropriées de sécurisation et de protection de la confidentialité des données.
                </p>
                <p>
                    Désactivation des cookies. En arrivant sur notre site, vous avez la possibilité de paramétrer vos cookies et de les modifier à tout moment en cliquant ici.
                </p>
                <p>
                    Vous pouvez à tout moment désactiver les cookies en sélectionnant les paramètres appropriés de votre navigateur pour désactiver les cookies (la rubrique d'aide du navigateur utilisé précise la marche à suivre).
                </p>
                <p>
                    Nous attirons votre attention sur le fait que la désactivation des cookies peut réduire ou empêcher l'accessibilité à tout ou partie de certaines fonctions.
                </p>

                <br />

                <div class="bold">
                    Nous collectons les informations que vous nous fournissez notamment quand :
                </div>

                <p> - vous naviguez sur notre plateforme et applications</p>
                <p> - vous créez, modifiez et accédez à votre compte personnel</p>
                <p> - vous remplissez un formulaire de contact</p>
                <p> - vous contactez notre Service Client</p>

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