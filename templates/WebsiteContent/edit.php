<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteContent $websiteContent
 */
?>
<?php $this->layout = 'admin_default'; ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('return Website Content'), ['action' => 'view'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="websiteContent form content">
            <?= $this->Form->create($websiteContent) ?>
            <fieldset>
                <legend><?= __('Edit Website Content') ?></legend>
                <?php
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
                    
                ?>

<div class="row">
    <?php
    echo $this->Form->control('home_image', [
        'type' => 'select',
        'options' => $images,
        'label' => false,
        'class' => 'form-select',
        'empty' => 'Please select an image'
    ]);
    ?>
</div>
<div class="row">
    <?php
    echo $this->Form->control('logo_image', [
        'type' => 'select',
        'options' => $images,
        'label' => false,
        'class' => 'form-select',
        'empty' => 'Please select an image'
    ]);
    ?>
</div>
<div class="row">
    <?php
    echo $this->Form->control('image1', [
        'type' => 'select',
        'options' => $images,
        'label' => false,
        'class' => 'form-select',
        'empty' => 'Please select an image'
    ]);
    ?>
</div>
<div class="row">
    <?php
    echo $this->Form->control('image2', [
        'type' => 'select',
        'options' => $images,
        'label' => false,
        'class' => 'form-select',
        'empty' => 'Please select an image'
    ]);
    ?>
</div>
<div class="row">
    <?php
    echo $this->Form->control('image3', [
        'type' => 'select',
        'options' => $images,
        'label' => false,
        'class' => 'form-select',
        'empty' => 'Please select an image'
    ]);
    ?>
</div>
<div class="row">
    <?php
    echo $this->Form->control('image4', [
        'type' => 'select',
        'options' => $images,
        'label' => false,
        'class' => 'form-select',
        'empty' => 'Please select an image'
    ]);
    ?>
</div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
