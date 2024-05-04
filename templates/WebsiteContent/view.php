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
            <?= $this->Html->link(__('Edit Website Content'), ['action' => 'edit', $websiteContent->id], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="websiteContent view content">
            <h3><?= h($websiteContent->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Home Image') ?></th>
                    <td><?= h($websiteContent->home_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($websiteContent->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($websiteContent->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($websiteContent->email) ?></td>
                </tr>
                <tr>
                    <th>Monday - Friday<?= __('Opening Time Weekdays') ?></th>
                    <td><?= h($websiteContent->opening_time_weekdays) ?></td>
                </tr>
                <tr>
                    <th>Weekends<?= __('Opening Time Weekends') ?></th>
                    <td><?= h($websiteContent->opening_time_weekends) ?></td>
                </tr>
                <tr>
                    <th><?= __('Logo Image') ?></th>
                    <td><?= h($websiteContent->logo_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('About Title') ?></th>
                    <td><?= h($websiteContent->about_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('About Us Image1') ?></th>
                    <td><?= h($websiteContent->image1) ?></td>
                </tr>
                <tr>
                    <th><?= __('About Us Image2') ?></th>
                    <td><?= h($websiteContent->image2) ?></td>
                </tr>
                <tr>
                    <th><?= __('About Us Image3') ?></th>
                    <td><?= h($websiteContent->image3) ?></td>
                </tr>
                <tr>
                    <th><?= __('About Us Image4') ?></th>
                    <td><?= h($websiteContent->image4) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($websiteContent->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('About Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($websiteContent->about_description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
