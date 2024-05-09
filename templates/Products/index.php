<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<?php if ($this->Identity->get('type') != "emp") : ?>
    <br />
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
    <br />
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>
    <div class="products index content">

    <?= $this->Html->link(__('Add New Product'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('Update Quantities'), ['action' => 'quantity_edit'], ['class' => 'btn btn-secondary']) ?>
    <?= $this->Html->link(__('Update Catering Discount'), ['action' => 'catering_edit'], ['class' => 'btn btn-info']) ?>
    <br />
    <br />

        <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Products') ?></h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('description') ?></th>
                        <th><?= $this->Paginator->sort('extra_info') ?></th>
                        <th><?= $this->Paginator->sort('price') ?></th>
                        <th><?= $this->Paginator->sort('quantity') ?></th>
                        <th><?= $this->Paginator->sort('catering_discount') ?></th>
                        <th><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= h($product->name) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($product->description) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($product->extra_info) ?></td>

                            <td>$<?= $this->Number->format($product->price) ?></td>

                            <td ><?= h($product->quantity) ?></td>
                            <td ><?= h($product->catering_discount) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $product->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?php if ($this->Identity->get('type') == "emp") : ?>

                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->name), 'class' => 'btn btn-sm btn-danger']) ?>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>
<?php endif; ?>