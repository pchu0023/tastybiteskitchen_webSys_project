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

    <div class="col">
        <div class="products form content">
        <?= $this->Form->create($websiteContent) ?>
            <fieldset>
            <legend><?= __('Edit website') ?></legend>
                <?= $this->Html->link(__('Go Back to View Website Content'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                <br>
                <br>
                <h4 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Edit Home Page</span>
                        </h4>
                <br>
                <h5 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Edit Home Page footer (contact)</span>
                        </h5>
                <br>
                <h6 class="d-flex border-bottom">
                    <span>Restaurant Address</span>
                </h6>
                <?php echo $this->Form->control('address', [
                    'class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'Restaurant Address'
                ]); ?>
                <div class="row">

                    <div class="col">
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Phone Number</span>
                        </h6>
                        <?php echo $this->Form->control('phone', [
                            'class' => 'form-control',
                            'label' => false,
                            'placeholder' => 'Phone Numbe'
                        ]); ?>
                    </div>
                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>Restaurant Email </span>
                        </h6>
                        <?php echo $this->Form->control('email', [
                            'class' => 'form-control',
                            'label' => false,
                            'placeholder' => 'Restaurant Email'
                        ]); ?>
                    </div>
                </div>
                <br>
                <h5 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Edit Home Page footer (opening)</span>
                        </h5>
                <div class="row">

                    <div class="col">
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Monday - Friday opening time</span>
                        </h6>
                        <?php echo $this->Form->control('opening_time_weekdays', [
                            'class' => 'form-control',
                            'label' => false,
                            'placeholder' => 'Monday - Friday opening time'
                        ]); ?>
                    </div>
                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>Weekends opening time </span>
                        </h6>
                        <?php echo $this->Form->control('opening_time_weekends', [
                            'class' => 'form-control',
                            'label' => false,
                            'placeholder' => 'Weekends opening time'
                        ]); ?>
                    </div>
                </div>
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
                                        <div class="row">
                                            <?php echo $this->Form->control('home_image', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
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
                                        <div class="row">
                                            <?php echo $this->Form->control('logo_image', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <br>
                <h4 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Edit About Us Page</span>
                        </h4>
                <br>
                <h6 class="d-flex border-bottom">
                    <span>About Us Title</span>
                </h6>
                <?php echo $this->Form->control('about_title', [
                    'class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'About Us Title'
                ]); ?>

                <h6 class="d-flex justify-content-between border-bottom pb-1">
                    <span>About Description</span>
                </h6>
                <?php echo $this->Form->control('about_description', [
                    'class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'About Description',
                    'rows' => 5
                ]); ?>
                <br />
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
                                        <div class="row">
                                            <?php echo $this->Form->control('image1', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
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
                                        <div class="row">
                                            <?php echo $this->Form->control('image2', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

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
                                            <span>About page Image Three</span>
                                        </h6>
                                        <div class="row">
                                            <?php echo $this->Form->control('image3', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
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
                                        <div class="row">
                                            <?php echo $this->Form->control('image4', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>
                <div class="row">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                </div>
                </fieldset>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- <?php
                    echo $this->Form->control('home_image');
                    echo $this->Form->control('address');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('email');
                    echo $this->Form->control('opening_time_weekdays');
                    echo $this->Form->control('opening_time_weekends');
                    echo $this->Form->control('logo_image');
                    echo $this->Form->control('about_title');
                    echo $this->Form->control('about_description');
                    echo $this->Form->control('image1');
                    echo $this->Form->control('image2');
                    echo $this->Form->control('image3');
                    echo $this->Form->control('image4');
                    
                ?> -->