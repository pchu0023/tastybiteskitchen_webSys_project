<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Image'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="images view content">
            <h3><?= h($image->file_location) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($image->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('File Location') ?></th>
                    <td><?= h($image->file_location) ?></td>
                    <img class="flex-sm-shrink-0 img-fluid rounded" src="<?= $image->file_location ?>" alt="not">
                </tr>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($image->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Description') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($image->products as $product) : ?>
                        <tr>
                            <td><?= h($product->id) ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->price) ?></td>
                            <td><?= h($product->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
