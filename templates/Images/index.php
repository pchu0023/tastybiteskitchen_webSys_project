<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Image> $images
 */
?>
<div class="images index content">
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h3><?= __('Images') ?></h3>
    <?= $this->Html->link(__('New Image'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
        </div>

    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th><?= $this->Paginator->sort('file_location', 'File Location') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image): ?>
            <tr>
                <td><?= h($image->file_location) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $image->id], ['class' => 'btn btn-info btn-sm']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $image->id], ['class' => 'btn btn-primary btn-sm']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id), 'class' => 'btn btn-danger btn-sm']) ?>
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
