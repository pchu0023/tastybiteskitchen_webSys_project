<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="orders index content">

<?= $this->Form->create(null, ['url' => ['controller' => 'Orders', 'action' => 'updateAllOrderStatus']]) ?>
    <!-- display for admin -->
    <?php $this->layout = 'admin_default'; ?>
    <?= $this->Html->link(__('Back To All Orders'), ['action' => 'index'], ['class' => 'btn btn-primary float-right']) ?>
    <br />
    <br />
    <h4>* Adjust all desired order statuses and then submit to record changes *</h4>
    <br />

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Orders') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= __('Status') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td style="max-width:100px; word-wrap:break-word;"><?= h($order->id) ?></td>
                    <td <?php echo $this->Form->control("status[$order->id]", ["class" => 'form-select', 'default' => $order->status, 'options' => ['Unpaid' => 'Unpaid', 'Payment_received' => 'Payment Received', 'Order_Packed' => 'Order Packed', 'Order_dispatched' => 'Order Dispatched', 'Order_completed' => 'Order Completed', 'Cancelled' => 'Order Cancelled'], 'label' => "Current status: " . $order->status]); ?> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br/>

    <div class="d-grid">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    </div>
    <br/>
    <br/>
</div>
<?= $this->Form->end() ?>
<?php endif; ?>
