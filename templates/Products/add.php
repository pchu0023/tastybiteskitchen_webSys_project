<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $images
 * @var \Cake\Collection\CollectionInterface|string[] $ingredients
 * @var \Cake\Collection\CollectionInterface|string[] $menus
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="products form content">
                <?= $this->Form->create($product) ?>
                <fieldset>
                    <legend><?= __('Add Product') ?></legend>
                    <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('price');
                    echo $this->Form->control('description');
                    echo $this->Form->control('images._ids', ['options' => $images]);
                    echo $this->Form->control('ingredients._ids', ['options' => $ingredients]);
                    echo $this->Form->control('menus._ids', ['options' => $menus]);
                    echo $this->Form->control('orders._ids', ['options' => $orders]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php endif; ?>
