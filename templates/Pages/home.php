<!DOCTYPE html>
<html lang="en">
<!-- IF CURRENT SESSION IS AN EMPLOYEE -->
<?php if($this->Identity->get('type') === "emp") : ?>
    <body>
    <div class="container-lg py-1 bg-light hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Welcome,<br>Admin.</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2"></p>
                <div class="button-container">
                    <a href="<?= $this->Url->build('/Users') ?>" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Add a new admin user</a>
                    <a href="<?= $this->Url->build('/Menus/admin-index') ?>" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Manage the menu</a>
                    <a href="<?= $this->Url->build('/Products') ?>" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Manage Food Items</a>
                    <a href="<?= $this->Url->build('/Images') ?>" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Manage Images</a>
                </div>
            </div>
            <div class="col-lg-5 text-right overflow-hidden">
            <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->home_image ?>" style="width: 768px; height: auto; object-fit: contain;" alt="">
            <!-- <?= $this->Html->image('meal.png', ["alt" => "Meal", "class" => "img-fluid"]) ?> -->
            </div>
        </div>
    </div>
</div>

<style>
    .button-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 10px; /* Adjust the gap as per your design */
    }   
    .button-container .btn {
        flex: 1;
        max-width: 200px; /* Adjust the maximum width as needed */
    }
</style>

    </body>

<!-- IF CURRENT IDENTITY IS NOT AN EMPLOYEE -->
<?php else : ?>
    <body>
    <div class="container-lg py-1 bg-light hero-header mb-5">
        <div class="container my-5 py-5" >
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Welcome to<br>Tasty Bites Kitchen</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2"></p>
                    <a href="<?= $this->Url->build('/Menus') ?>" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Check out the menu!</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->home_image ?>" style="width: 768px; height: auto; object-fit: contain;" alt="">
                            <!-- <?= $this->Html->image('meal.png', ["alt" => "Meal", "class" => "img-fluid"]) ?> -->
            </div>
            </div>
        </div>
    </div>
    <div id="content">
   
<!-- Begin Page Content -->
<div class="container-fluid bg-body">

    <body>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="/team031-app_fit3047/webroot/img/ProductImages/vindaloo.png">

                                <!-- <img src="/team031-app_fit3047/img/about-1.jpg" alt="About Us" class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"> -->
                            </div>

                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="/team031-app_fit3047/webroot/img/ProductImages/order.jpg" style="margin-top: 25%">

                                <!-- <img src="/team031-app_fit3047/img/about-2.jpg" alt="About Us" class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" style="margin-top: 25%"> -->
                            </div>

                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="">

                                <!-- <img src="/team031-app_fit3047/img/about-3.jpg" alt="About Us" class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"> -->
                            </div>

                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="">

                                <!-- <img src="/team031-app_fit3047/img/about-4.jpg" alt="About Us" class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"> -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal"> Who we are</h5>
                        <h1 class="mb-4"><i class="fa fa-utensils text-primary me-2"></i>Tasty Bites Kitchen</h1>
                        <p>At Tasty Bites, we take pride in crafting delicious homemade meals for both individual customers seeking flavorful dishes and wholesale clients looking to cater memorable events. Our diverse menu, featuring rotating set menus posted weekly, reflects our commitment to offering fresh, innovative, and mouthwatering options.<br />
                            <br>Your satisfaction is our priority, and we look forward to sharing our passion for food with you at Tasty Bites Kitchen.
                        </p>
                        </p>
                        <a href="<?= $this->Url->build('/About') ?>" class="btn btn-primary py-3 px-5 mt-2 wow fadeInUp">Read More</a>

                        <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
    </body>
<?php endif; ?>


