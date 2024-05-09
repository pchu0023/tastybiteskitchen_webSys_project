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
    <div class="webpage index content">

        <?= $this->Html->link(__('Edit Home and Footer'), ['action' => 'edit'], ['class' => 'btn btn-primary']) ?>
        <?= $this->Html->link(__('Edit About Page Content'), ['action' => 'add'], ['class' => 'btn btn-secondary float-right']) ?>

        <br /><br />



        <div class="col">

            <div class="products form content">



                <h3 class="heading"><?= __('Current Website Display') ?></h3>

                <br>
                <h5 class="d-flex justify-content-between border-bottom pb-1" style="color: orange;">
                    <span>Footer (contact section)</span>
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
                <h5 class="d-flex justify-content-between border-bottom pb-1" style="color: orange;">
                    <span>Footer (opening section) </span>
                </h5>
                <div class="row">

                    <div class="col">
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>opening content 1</span>
                        </h6>
                        <?= h($websiteContent->opening_content1) ?>
                    </div>
                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>opening content 2</span>
                        </h6>
                        <?= h($websiteContent->opening_content2) ?>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Opening time 1</span>
                        </h6>
                        <?= h($websiteContent->opening_time_weekdays) ?>
                    </div>
                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>Opening time 2</span>
                        </h6>
                        <?= h($websiteContent->opening_time_weekends) ?>
                    </div>
                </div>

                <br>
                <br>
                <h5 class="d-flex justify-content-between border-bottom pb-1" style="color: orange;">
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
                <h5 class="d-flex justify-content-between border-bottom pb-1" style="color: orange;">
                    <span>About Us Page Details</span>
                    </h4>
                    <br>
                    <h6 class="d-flex border-bottom">
                        <span>About Us Title</span>
                    </h6>
                    <?= h($websiteContent->about_title) ?>

                    <br>
                    <br>
                    <h6 class="d-flex justify-content-between border-bottom pb-1">
                        <span>About Description</span>
                    </h6>
                    <?= $this->Text->autoParagraph(h($websiteContent->about_description)); ?>
                    <br />

                    <h5 class="d-flex justify-content-between border-bottom pb-1" style="color: orange;">
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