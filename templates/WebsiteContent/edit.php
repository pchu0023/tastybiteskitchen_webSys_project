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


<!-- 
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
                                            <span>select home image</span>
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
       -->

            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
