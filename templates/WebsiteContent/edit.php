<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteContent $websiteContent
 */
$filenameOnlyImages = [];

foreach ($globalImages as $key => $fullPath) {
    $filenameOnlyImages[$key] = basename($fullPath);
}
?>
<?php if ($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>
    <div class="websiteContent manage content">

        <legend><?= __('Edit website Home page') ?></legend>
        <div class="col">
            <div class="products form content">
                <?= $this->Form->create($websiteContent) ?>
                <fieldset>

                    <?= $this->Html->link(__('View Website Display'), ['action' => 'view'], ['class' => 'btn btn-secondary']) ?>

                    <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>

                    <!-- <br>
                <br>
                <h4 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Edit website Home page</span>
                        </h4> -->
                    <br><br>
                    <h5 class="d-flex justify-content-between border-bottom pb-1" style="color: orange;">
                        <span>Edit footer (contact section)</span>
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
                                'id' => 'phone',
                                'label' => false,
                                'placeholder' => 'Phone Number'
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
                    <h5 class="d-flex justify-content-between border-bottom pb-1" style="color: orange;">
                        <span>Edit footer (opening section)</span>
                    </h5>
                    <!-- <div class="row">
 
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
                </div> -->
                    <div class="row">

                        <div class="col">
                            <br />
                            <h6 class="d-flex justify-content-between border-bottom pb-1">
                                <span>Opening content 1</span>
                            </h6>
                            <?php echo $this->Form->control('opening_content1', [
                                'class' => 'form-control',
                                'id' => 'phone',
                                'label' => false,
                                'placeholder' => 'eg. Monday - Friday '
                            ]); ?>
                        </div>
                        <div class="col">
                            <br />
                            <h6 class="d-flex border-bottom">
                                <span>Opening content 2</span>
                            </h6>
                            <?php echo $this->Form->control('opening_content2', [
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'eg.Weekends'
                            ]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <br />


                            <h6 class="d-flex justify-content-between border-bottom pb-1">
                                <span>Opening time 1</span>
                            </h6>
                            <div class="row">
                                <div class="col">
                                    <?php echo $this->Form->control('opening_time_weekdays_start', [
                                        'type' => 'select',
                                        'options' => array_combine(range(1, 12), range(1, 12)),
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'Hour'
                                    ]); ?></div>
                                <div class="col">
                                    <?php echo $this->Form->control('opening_time_weekdays_am_pm_start', [
                                        'type' => 'select',
                                        'options' => ['AM' => 'AM', 'PM' => 'PM'],
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'AM/PM'
                                    ]); ?>
                                </div>
                                <div class="col">

                                    <?php echo $this->Form->control('opening_time_weekdays_end', [
                                        'type' => 'select',
                                        'options' => array_combine(range(1, 12), range(1, 12)),
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'Hour'
                                    ]); ?>
                                </div>
                                <div class="col">

                                    <?php echo $this->Form->control('opening_time_weekdays_am_pm_end', [
                                        'type' => 'select',
                                        'options' => ['AM' => 'AM', 'PM' => 'PM'],
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'AM/PM'
                                    ]); ?>
                                </div>
                                <?php echo $this->Form->control('extra_info_weekdays', [
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Additional Info (e.g., Holidays)',
                                ]); ?>
                            </div>
                        </div>
                        <div class="col">
                            <br />
                            <h6 class="d-flex justify-content-between border-bottom pb-1">
                                <span>Opening time 2</span>
                            </h6>
                            <div class="row">
                                <div class="col">
                                    <?php echo $this->Form->control('opening_time_weekends_start', [
                                        'type' => 'select',
                                        'options' => array_combine(range(1, 12), range(1, 12)),
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'Hour'
                                    ]); ?>
                                </div>
                                <div class="col">
                                    <?php echo $this->Form->control('opening_time_weekends_am_pm_start', [
                                        'type' => 'select',
                                        'options' => ['AM' => 'AM', 'PM' => 'PM'],
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'AM/PM'
                                    ]); ?>
                                </div>
                                <div class="col">
                                    <?php echo $this->Form->control('opening_time_weekends_end', [
                                        'type' => 'select',
                                        'options' => array_combine(range(1, 12), range(1, 12)),
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'Hour'
                                    ]); ?>
                                </div>
                                <div class="col">
                                    <?php echo $this->Form->control('opening_time_weekends_am_pm_end', [
                                        'type' => 'select',
                                        'options' => ['AM' => 'AM', 'PM' => 'PM'],
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => 'AM/PM'
                                    ]); ?>
                                </div>
                                <?php echo $this->Form->control('extra_info_weekends', [
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Additional Info (e.g., Special Events)',
                                ]); ?>
                            </div>
                            <br>
                        </div>

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
                                                <div class="row">
                                                    <?php echo $this->Form->control('home_image', ['options' => $filenameOnlyImages, 'label' => false, 'class' => 'd-flex flex form-select', 'empty' => 'None']); ?>
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
                                                    <?php echo $this->Form->control('logo_image', ['options' => $filenameOnlyImages, 'label' => false, 'class' => 'd-flex flex form-select', 'empty' => 'None']); ?>
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
                                                    <span>Home background Image</span>
                                                </h6>
                                                <div class="row">
                                                    <?php echo $this->Form->control('background_image', ['options' => $filenameOnlyImages, 'label' => false, 'class' => 'd-flex flex form-select', 'empty' => 'None']); ?>
                                                </div>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                            </div>
                            
                        </div>

                        <div class="row">
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                </fieldset>
                <br>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const phoneInput = document.getElementById('phone');

            phoneInput.addEventListener('input', function(e) {
                var value = e.target.value;
                var formatted = value.replace(/[^\d\s]/g, '')
                    .replace(/\s+/g, ' ')
                    .trim()
                    .substring(0, 12);


                if (formatted.length === 2 || formatted.length === 7) {
                    formatted += ' ';
                }

                phoneInput.value = formatted;
            });
        });
    </script>

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