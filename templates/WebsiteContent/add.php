<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteContent $websiteContent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Website Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="websiteContent form content">
            <?= $this->Form->create($websiteContent) ?>
            <fieldset>
                <legend><?= __('Add Website Content') ?></legend>
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
                    echo $this->Form->control('about_us_image1');
                    echo $this->Form->control('about_us_image2');
                    echo $this->Form->control('about_us_image3');
                    echo $this->Form->control('about_us_image4');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
