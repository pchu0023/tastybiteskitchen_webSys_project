<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\MenusProduct> $menusProducts
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="menusProducts index content">
        <?= $this->Html->link(__('New Menus Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
        <h3><?= __('Menus Products') ?></h3>
        <div class="table-responsive">
            <table>
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('menu_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($menusProducts as $menusProduct): ?>
                    <tr>
                        <td><?= h($menusProduct->id) ?></td>
                        <td><?= $menusProduct->hasValue('menu') ? $this->Html->link($menusProduct->menu->name, ['controller' => 'Menus', 'action' => 'view', $menusProduct->menu->id]) : '' ?></td>
                        <td><?= $menusProduct->hasValue('product') ? $this->Html->link($menusProduct->product->name, ['controller' => 'Products', 'action' => 'view', $menusProduct->product->id]) : '' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $menusProduct->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menusProduct->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menusProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menusProduct->id)]) ?>
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
