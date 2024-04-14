<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenusProduct $menusProduct
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Menus Product'), ['action' => 'edit', $menusProduct->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Menus Product'), ['action' => 'delete', $menusProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menusProduct->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Menus Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Menus Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="menusProducts view content">
                <h3><?= h($menusProduct->id) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= h($menusProduct->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Menu') ?></th>
                        <td><?= $menusProduct->hasValue('menu') ? $this->Html->link($menusProduct->menu->name, ['controller' => 'Menus', 'action' => 'view', $menusProduct->menu->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Product') ?></th>
                        <td><?= $menusProduct->hasValue('product') ? $this->Html->link($menusProduct->product->name, ['controller' => 'Products', 'action' => 'view', $menusProduct->product->id]) : '' ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
