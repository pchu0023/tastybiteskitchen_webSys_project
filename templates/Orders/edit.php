<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var string[]|\Cake\Collection\CollectionInterface $payments
 * @var string[]|\Cake\Collection\CollectionInterface $deliveries
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $ordersProduct
 */
?>
<?php if ($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>
    <div class="order manage content">
        <div class="row">
            <div class="column column-80">
                <legend><?= __('Edit Order') ?></legend>
                <aside class="column">
                    <div class="side-nav">
                        <?= $this->Html->link(__('Back To All Orders'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink(
                            __('Delete Order'),
                            ['action' => 'delete', $order->id],
                            ['confirm' => __('Are you sure you want to delete order:# {0}?', $order->id), 'class' => 'btn btn-danger']
                        ) ?>
                    </div>
                    <br />
                </aside>
                <div class="order form content">
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Orders', 'action' => 'updateAllOrderStatus']]) ?>
                    <fieldset>
                        <h6 class="d-flex border-bottom">
                            <span>
                                <strong><?= __('Order ID') ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;<?= h($order->id) ?>
                            </span>
                        </h6>
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>
                                <strong><?= __('Order Status') ?></strong>
                            </span>
                        </h6>
                        <div class="dropdown">
                            <?php echo $this->Form->control("status[$order->id]", ["class" => 'form-select', 'default' => $order->status, 'options' => ['Unpaid' => 'Unpaid', 'Payment_received' => 'Payment Received', 'Order_Packed' => 'Order Packed', 'Order_dispatched' => 'Order Dispatched', 'Order_completed' => 'Order Completed', 'Cancelled' => 'Order Cancelled'], 'label' => "Current status: " . $order->status]); ?>
                        </div>
                        <br />
                        <?= $this->Form->button(__('Update Status'), ['class' => 'btn btn-success']) ?>
                        <?= $this->Form->end() ?>
                    </fieldset>
                    <br />
                    <fieldset>
                        <h6 class="d-flex border-bottom">
                            <span>
                                <strong><?= __('Products in Order') ?></strong>
                            </span>
                        </h6>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?= __('Product Name') ?></th>
                                        <th><?= __('Price') ?></th>
                                        <th><?= __('Description') ?></th>
                                        <th><?= __('Quantity') ?></th>
                                        <th class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($orderProducts)) {
                                        foreach ($orderProducts as $ordersProduct) : ?>
                                            <tr>
                                                <td><?= h($ordersProduct->product_name) ?></td>
                                                <td><?= h($ordersProduct->product_price) ?></td>
                                                <td><?= h($ordersProduct->product_description) ?></td>
                                                <td>
                                                    <?= $this->Form->create(null, ['url' => ['controller' => 'OrdersProducts', 'action' => 'edit', $ordersProduct->id]]) ?>
                                                    <?php echo $this->Form->control('quantity', [
                                                        'class' => 'form-control',
                                                        'type' => 'number',
                                                        'step' => '1',
                                                        'min' => '1',
                                                        'max' => '100',
                                                        'label' => false,
                                                        'default' => $ordersProduct->quantity,
                                                    ]); ?>
                                                </td>
                                                <td class="actions">
                                                    <?= $this->Form->button(__('Update quantity'), ['class' => 'btn btn-success']) ?>
                                                    <?= $this->Html->link(
                                                        __('Remove from order'),
                                                        ['controller' => 'OrdersProducts', 'action' => 'deleteRelation', $order->id, $ordersProduct->product_id],
                                                        ['class' => 'btn btn-danger', 'escape' => false, 'onclick' => "return confirm('Are you sure you want to remove this product from the order?');"]
                                                    ) ?>
                                                    <?= $this->Form->end() ?>
                                                </td>

                                            </tr>
                                    <?php endforeach;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>