<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <!-- Favicon -->
    <?= $this->Html->meta('icon') ?>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <?= $this->Html->css('/vendor/restoran/lib/animate/animate.min.css') ?>
    <?= $this->Html->css('/vendor/restoran/lib/owlcarousel/assets/owl.carousel.min.css') ?>
    <?= $this->Html->css('/vendor/restoran/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') ?>

    <!-- Customized Bootstrap Stylesheet -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <!-- Template Stylesheet -->
    <?= $this->Html->css('style.css') ?>
</head>

<body>
<div class="container-xxl bg-dark p-0">

    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="<?= $this->Url->build('/') ?>" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Tasty Bites Kitchen</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="<?= $this->Url->build('/') ?>" class="nav-item nav-link">Home</a>
                    <a href="<?= $this->Url->build('/Menus') ?>" class="nav-item nav-link">Menu</a>
                    <a href="<?= $this->Url->build('/About') ?>" class="nav-item nav-link">About Us</a>
                </div>
                <?php
                if (!$this->Identity->isLoggedIn()) {
                    echo $this->Html->link(
                        'LOG IN',
                        ['controller' => 'Auth', 'action' => 'login'],
                        ['class' => 'button button-outline']);
                }
                ?>
                <?php
                if ($this->Identity->isLoggedIn()) {
                    echo $this->Html->link('LOGOUT', ['controller' => 'Auth', 'action' => 'logout']);
                }
                ?>
            </div>
        </nav>
    </div>
    <br />
    <br />
    <br />
    <br />
    <!-- Navbar & Hero End -->

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid bg-body">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <!-- page content here -->
        </div>

    </div>
    <!-- End of Main Content -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer- pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                    <p class="mb-2"><a class="btn btn-link" href="<?= $this->Url->build('/About') ?>">About Us</a><p class="mb-2">
                    <a class="btn btn-link" href="<?= $this->Url->build('/Menus') ?>">Menu</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>12/4 Bromham Place, Richmond VIC 3121</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>03 0988 9485</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>tastyBitesAdmin@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                    <h5 class="text-light fw-normal">Monday - Friday</h5>
                    <p>6PM - 12AM</p>
                    <h5 class="text-light fw-normal">Weekends</h5>
                    <p>11AM - 12AM</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Tasty Bites Kitchen</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<?= $this->Html->script("https://code.jquery.com/jquery-3.4.1.min.js") ?>
<?= $this->Html->script("https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js") ?>
<?= $this->Html->script('/vendor/restoran/lib/wow/wow.min.js') ?>
<?= $this->Html->script('/vendor/restoran/lib/easing/easing.min.js') ?>
<?= $this->Html->script('/vendor/restoran/lib/waypoints/waypoints.min.js') ?>
<?= $this->Html->script('/vendor/restoran/lib/counterup/counterup.min.js') ?>
<?= $this->Html->script('/vendor/restoran/lib/owlcarousel/owl.carousel.min.js') ?>
<?= $this->Html->script('/vendor/restoran/lib/tempusdominus/js/moment.min.js') ?>
<?= $this->Html->script('/vendor/restoran/lib/tempusdominus/js/moment-timezone.min.js') ?>
<?= $this->Html->script('/vendor/restoran/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') ?>

<!-- Template Javascript -->
<?= $this->Html->script('/js/main.js') ?>
<!--<script src="/team031-app_fit3047/webroot/js/main.js"></script>-->
</body>

</html>
