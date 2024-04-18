<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <br/>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
    <br/>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>
    <br />
    <?= $this->Html->link(__('Add New Product'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        <br />
        <br />
<div class="products index content">

    <div class="container my-4">
        <h3><?= __('Products') ?></h3>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= h($product->name) ?></td>
                        <td><?= $this->Number->format($product->price) ?> $ </td>
                        <td><?= h($product->description) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $product->id], ['class' => 'btn btn-sm btn-info']) ?>
                            <?php if($this->Identity->get('type') == "emp") : ?>
                            
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-sm btn-danger']) ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="paginator py-3">
            <ul class="pagination justify-content-center">
                <?= $this->Paginator->first('<< ' . __('first'), ['class' => 'page-item']) ?>
                <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'page-item']) ?>
                <?= $this->Paginator->numbers(['class' => 'page-item']) ?>
                <?= $this->Paginator->next(__('next') . ' >', ['class' => 'page-item']) ?>
                <?= $this->Paginator->last(__('last') . ' >>', ['class' => 'page-item']) ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    </div>
<?php endif; ?>
