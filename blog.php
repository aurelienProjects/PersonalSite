<?php
session_start(); // On démarre la session AVANT toute chose
$_SESSION['page'] = '5';
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

        <div class="site-section bg-white">
            <div class="container">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-7 text-center mb-5">
                        <h2 class="section-heading text-center">Our Blog</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="post-entry-1 h-100">
                            <a href="single.html">
                                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-entry-1-contents">

                                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-5 text-center">
                        <span class="p-3">1</span>
                        <a href="#" class="p-3">2</a>
                        <a href="#" class="p-3">3</a>
                        <a href="#" class="p-3">4</a>
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