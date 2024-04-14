<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IngredientsProduct $ingredientsProduct
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Ingredients Product'), ['action' => 'edit', $ingredientsProduct->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Ingredients Product'), ['action' => 'delete', $ingredientsProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredientsProduct->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Ingredients Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Ingredients Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="ingredientsProducts view content">
                <h3><?= h($ingredientsProduct->id) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= h($ingredientsProduct->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Product') ?></th>
                        <td><?= $ingredientsProduct->hasValue('product') ? $this->Html->link($ingredientsProduct->product->name, ['controller' => 'Products', 'action' => 'view', $ingredientsProduct->product->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Ingredient') ?></th>
                        <td><?= $ingredientsProduct->hasValue('ingredient') ? $this->Html->link($ingredientsProduct->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $ingredientsProduct->ingredient->id]) : '' ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
