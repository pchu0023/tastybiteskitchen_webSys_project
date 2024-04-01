<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ImagesProduct> $imagesProducts
 */
?>
<div class="imagesProducts index content">
    <?= $this->Html->link(__('New Images Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Images Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('image_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imagesProducts as $imagesProduct): ?>
                <tr>
                    <td><?= h($imagesProduct->id) ?></td>
                    <td><?= $imagesProduct->hasValue('image') ? $this->Html->link($imagesProduct->image->file_location, ['controller' => 'Images', 'action' => 'view', $imagesProduct->image->id]) : '' ?></td>
                    <td><?= h($imagesProduct->product_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $imagesProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imagesProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imagesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagesProduct->id)]) ?>
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
