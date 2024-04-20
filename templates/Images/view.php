<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>
<?php $this->layout = 'admin_default'; ?>

<div class="row">
    <!--     
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column column-80">
        <aside class="column">
            <div class="side-nav">
                <h3 class="heading"><?= __('Administrative Actions') ?></h3>
                <!-- image cant edit, only create new one  -->
                <!-- <?= $this->Html->link(__('Edit Image'), ['action' => 'edit', $image->id], ['class' => 'btn btn-primary']) ?> -->
                <?= $this->Form->postLink(__('Delete Image'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id), 'class' => 'btn btn-danger']) ?>
                <?= $this->Html->link(__('Go Back To All Images'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>

            </div>
        </aside>
        <br>
        <div class="images view content">
        <h3 class="d-flex justify-content-between border-bottom pb-1">Image detail</h3>

            <h4>Image File: <?= basename($image->file_location) ?></h4>
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
            <br>
            <div class="related">
                <h4><?= __('Related Products') ?></h4>
                <?php if (!empty($image->products)) : ?>
                    <div class="table-responsive">
                    <table class="table table-striped">
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
                                        <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id], ['class'=>'btn btn-sm btn-info']) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id], ['class'=>'btn btn-sm btn-primary']) ?>
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