<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdersProduct $ordersProduct
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Orders Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="ordersProducts form content">
                <?= $this->Form->create($ordersProduct) ?>
                <fieldset>
                    <legend><?= __('Add Orders Product') ?></legend>
                    <?php
                    echo $this->Form->control('order_id', ['options' => $orders]);
                    echo $this->Form->control('product_id', ['options' => $products]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php endif; ?>
