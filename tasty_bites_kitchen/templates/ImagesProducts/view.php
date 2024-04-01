<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagesProduct $imagesProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Images Product'), ['action' => 'edit', $imagesProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Images Product'), ['action' => 'delete', $imagesProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagesProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Images Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Images Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagesProducts view content">
            <h3><?= h($imagesProduct->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($imagesProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= $imagesProduct->hasValue('image') ? $this->Html->link($imagesProduct->image->file_location, ['controller' => 'Images', 'action' => 'view', $imagesProduct->image->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product Id') ?></th>
                    <td><?= h($imagesProduct->product_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
