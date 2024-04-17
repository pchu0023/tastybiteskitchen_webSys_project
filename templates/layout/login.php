<?php
/**
 * Login layout
 *
 * This layout comes with no navigation bar and Flash renderer placeholder. Usually used for login page or similar.
 *
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$appLocale = Configure::read('App.defaultLocale');
?>
<!DOCTYPE html>
<html lang="<?= $appLocale ?>">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> - Login
    </title>
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


    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <!-- Customized Bootstrap Stylesheet -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<!-- <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="<?= $this->Url->build('/') ?>" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Tasty Bites Kitchen</h1>
            </a> -->

<div class="container-xxl position-relative p-0">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center px-4 px-lg-5 py-3 ">
        <a href="<?= $this->Url->build('/') ?>" class="navbar-brand p-0">
            <!--     Replace logo       -->
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Tasty Bites Kitchen</h1>
        </a>
    </nav>
</div>
</div>
<br />
<br />
<br />
<br />
<main class="main">
    <?= $this->fetch('content') ?>
</main>
<footer>
    <?= $this->element('footer_copyright', [], ['ignoreMissing' => true]); ?>

    <?= $this->fetch('footer_script') ?>
</footer>
</body>
</html>
