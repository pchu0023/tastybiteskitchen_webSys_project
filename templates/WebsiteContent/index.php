<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\WebsiteContent> $websiteContent
 */
?>
<div class="websiteContent index content">
    <?= $this->Html->link(__('New Website Content'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Website Content') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('home_image') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('opening_time_weekdays') ?></th>
                    <th><?= $this->Paginator->sort('opening_time_weekends') ?></th>
                    <th><?= $this->Paginator->sort('logo_image') ?></th>
                    <th><?= $this->Paginator->sort('about_title') ?></th>
                    <th><?= $this->Paginator->sort('about_us_image1') ?></th>
                    <th><?= $this->Paginator->sort('about_us_image2') ?></th>
                    <th><?= $this->Paginator->sort('about_us_image3') ?></th>
                    <th><?= $this->Paginator->sort('about_us_image4') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($websiteContent as $websiteContent): ?>
                <tr>
                    <td><?= $this->Number->format($websiteContent->id) ?></td>
                    <td><?= h($websiteContent->home_image) ?></td>
                    <td><?= h($websiteContent->address) ?></td>
                    <td><?= h($websiteContent->phone) ?></td>
                    <td><?= h($websiteContent->email) ?></td>
                    <td><?= h($websiteContent->opening_time_weekdays) ?></td>
                    <td><?= h($websiteContent->opening_time_weekends) ?></td>
                    <td><?= h($websiteContent->logo_image) ?></td>
                    <td><?= h($websiteContent->about_title) ?></td>
                    <td><?= h($websiteContent->about_us_image1) ?></td>
                    <td><?= h($websiteContent->about_us_image2) ?></td>
                    <td><?= h($websiteContent->about_us_image3) ?></td>
                    <td><?= h($websiteContent->about_us_image4) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $websiteContent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $websiteContent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $websiteContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $websiteContent->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
