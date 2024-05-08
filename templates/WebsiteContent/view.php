<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteContent $websiteContent
 */
?>
<?php if ($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
    <?php else : ?>
<?php $this->layout = 'admin_default'; ?>
    <br />
    <?= $this->Html->link(__('Go Back to Edit website home page'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Go Back to Edit website about page'), ['action' => 'add'], ['class' => 'btn btn-secondary float-right']) ?>

    <br /><br />
    

                 
<div class="col">

        <div class="products form content">



            <h3 class="heading"><?= __('Edit Website Display') ?></h3>
            
                <br>
                <h5 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Home Page footer (contact)</span>
                        </h5>

                <div class="row">
                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                    <span>Restaurant Address</span>
                </h6>
                <?= h($websiteContent->address) ?>
                    </div>

                    <div class="col">
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Phone Number</span>
                        </h6>
                        <?= h($websiteContent->phone) ?>
                    </div>

                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>Restaurant Email </span>
                        </h6>
                        <?= h($websiteContent->email) ?>
                    </div>
                </div>
                <br>
                <h5 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Home Page footer (opening)</span>
                        </h5>
                <div class="row">

                    <div class="col">
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Monday - Friday opening time</span>
                        </h6>
                        <?= h($websiteContent->opening_time_weekdays) ?>
                    </div>
                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>Weekends opening time </span>
                        </h6>
                        <?= h($websiteContent->opening_time_weekends) ?>
                    </div>
                </div>
                
                <br>
                <h5 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Home Page Image</span>
                        </h5>
                <div class="row">

                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>Home Image</span>
                                        </h6>
                                        <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->home_image ?>" style="width: 200px; height: auto; object-fit: contain;" alt="None image in there">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>Logo Image</span>
                                        </h6>
                                        <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->logo_image ?>" style="width: 200px; height: auto; object-fit: contain;" alt="None image in there">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>Home Background Image</span>
                                        </h6>
                                        <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->background_image ?>" style="width: 200px; height: auto; object-fit: contain;" alt="None image in there">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



                <br>
                <br>
                <h4 class="d-flex justify-content-between border-bottom pb-1">
                            <span>About Us Page Details</span>
                        </h4>
                <br>
                <h6 class="d-flex border-bottom">
                    <span>About Us Title</span>
                </h6>
                <?= h($websiteContent->about_title) ?>

                <h6 class="d-flex justify-content-between border-bottom pb-1">
                    <span>About Description</span>
                </h6>
                <?= $this->Text->autoParagraph(h($websiteContent->about_description)); ?>
                <br />
                
                <h5 class="d-flex justify-content-between border-bottom pb-1">
                            <span>About Us Page Image</span>
                        </h5>
                <div class="row">

                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>About page Image One</span>
                                        </h6>
                                        <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->image1 ?>" style="width: 200px; height: auto; object-fit: contain;" alt="None image in there">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>About page Image Two</span>
                                        </h6>
                                        <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->image2 ?>" style="width: 200px; height: auto; object-fit: contain;" alt="None image in there">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>About page Image Three</span>
                                        </h6>
                                        <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->image3 ?>" style="width: 200px; height: auto; object-fit: contain;" alt="None image in there">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>About page Image Four</span>
                                        </h6>
                                        <img class="flex-sm-shrink-0 img-fluid roundd" src="<?= $websiteContent->image4 ?>" style="width: 200px; height: auto; object-fit: contain;" alt="None image in there">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <br>
                

        </div>
    </div>
</div>


<?php endif; ?>