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

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <!-- Customized Bootstrap Stylesheet -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-brand bg-primary border-bottom justify-content-center px-4 px-lg-5 py-3 py-lg-0">
        <a href="<?= $this->Url->build('/') ?>" class="navbar-brand p-0">
            <!--     Replace cake-logo with TBK logo       -->
            <?= $this->Html->image('cake-logo.png', ["alt" => "Logo", "class" => "img-fluid mx-auto img-responsive"]) ?>
        </a>
    </nav>
</div>
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
