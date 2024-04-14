<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\IngredientsProduct> $ingredientsProducts
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="ingredientsProducts index content">
        <?= $this->Html->link(__('New Ingredients Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
        <h3><?= __('Ingredients Products') ?></h3>
        <div class="table-responsive">
            <table>
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('ingredient_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ingredientsProducts as $ingredientsProduct): ?>
                    <tr>
                        <td><?= h($ingredientsProduct->id) ?></td>
                        <td><?= $ingredientsProduct->hasValue('product') ? $this->Html->link($ingredientsProduct->product->name, ['controller' => 'Products', 'action' => 'view', $ingredientsProduct->product->id]) : '' ?></td>
                        <td><?= $ingredientsProduct->hasValue('ingredient') ? $this->Html->link($ingredientsProduct->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $ingredientsProduct->ingredient->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $ingredientsProduct->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ingredientsProduct->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ingredientsProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredientsProduct->id)]) ?>
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
<?php endif; ?>
