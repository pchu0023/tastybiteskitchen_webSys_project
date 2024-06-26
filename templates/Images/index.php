<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Image> $images
 */
?>
<?php $this->layout = 'admin_default'; ?>
<div class="images index content">

    <?= $this->Html->link(__('Add New Image'), ['action' => 'add'], ['class' => 'btn btn-success', 'style' => 'background-color: orange; border-color: orange;']) ?>
    <br>
    <br>

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Images') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('file_location', 'File Location') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image) : ?>
                    <tr>
                        <td><?= h(basename($image->file_location)) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $image->id], ['class' => 'btn btn-info btn-sm']) ?>
                            <!-- image should be delete and add new instead of edit -->
                            <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $image->id], ['class' => 'btn btn-primary btn-sm']) ?> -->
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', basename($image->file_location)), 'class' => 'btn btn-danger btn-sm']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>