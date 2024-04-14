<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $payments
 * @var \Cake\Collection\CollectionInterface|string[] $deliveries
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
                <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="orders form content">
                <?= $this->Form->create($order) ?>
                <fieldset>
                    <legend><?= __('Add Order') ?></legend>
                    <?php
                    echo $this->Form->control('payment_id', ['options' => $payments]);
                    echo $this->Form->control('delivery_id', ['options' => $deliveries]);
                    echo $this->Form->control('products._ids', ['options' => $products]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php endif; ?>
