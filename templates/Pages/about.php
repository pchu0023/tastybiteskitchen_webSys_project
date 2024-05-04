<body>
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?= h($websiteContent->about_title) ?></h1>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                           <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?= $websiteContent->image1 ?>">

                            <!-- <?= $this->Html->image('about-1.jpg', ["alt" => "About Us", "class" => "img-fluid rounded w-100 wow zoomIn", "data-wow-delay" => "0.1s"]) ?> -->
                        </div>
                        
                        <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="<?= $websiteContent->image2 ?>">    

                        <!-- <?= $this->Html->image('about-2.jpg', ["alt" => "About Us", "class" => "img-fluid rounded w-75 wow zoomIn", "data-wow-delay" => "0.3s", "style" => "margin-top: 25%"]) ?> -->
                        </div>

                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="<?= $websiteContent->image3 ?>">

                            <!-- <?= $this->Html->image('about-3.jpg', ["alt" => "About Us", "class" => "img-fluid rounded w-75 wow zoomIn", "data-wow-delay" => "0.5s"]) ?> -->
                        </div>

                        <div class="col-6 text-end">
                             <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?= $websiteContent->image4 ?>">

                            <!-- <?= $this->Html->image('about-4.jpg', ["alt" => "About Us", "class" => "img-fluid rounded w-100 wow zoomIn", "data-wow-delay" => "0.7s"]) ?> -->
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Get to know more about us</h5>
                        <h1 class="mb-4"><i class="fa fa-utensils text-primary me-2"></i>Tasty Bites Kitchen</h1>
                        <p> <?= $this->Text->autoParagraph(h($websiteContent->about_description)); ?></p>
                        <a class="btn btn-primary py-3 px-5 mt-2 wow fadeInUp" href="<?= $this->Url->build('/Menus') ?>" role="button">Order Now</a>
            <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> -->
                </div>
            </div>
        </div>
    </div>
</body>
