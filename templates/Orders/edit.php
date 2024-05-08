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
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>

    <br />
    <?= $this->Html->link(__('Back To All Orders'), ['action' => 'index'], ['class' => 'btn btn-primary float-right']) ?>
    <br />
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Order ID') ?></h4>
                <td><?= h($order->id) ?></td>

                <h4 class="heading"><?= __('Order Status') ?></h4>
                <tr>
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Orders', 'action' => 'updateAllOrderStatus']]) ?>
                    <td <?php echo $this->Form->control("status[$order->id]", ["class" => 'form-select', 'default' => $order->status, 'options' => ['Unpaid' => 'Unpaid', 'Payment_received' => 'Payment Received', 'Order_Packed' => 'Order Packed', 'Order_dispatched' => 'Order Dispatched', 'Order_completed' => 'Order Completed'], 'label' => "Current status: " . $order->status]); ?> </td>
                    <?= $this->Form->button(__('Update Status'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                </tr>
                <table>
                    <tr>
                        <th><?= __('Product Name') ?></th>
                        <th><?= __('Price') ?></th>
                        <th><?= __('Quantity') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <h4 class="heading"><?= __('Products in order') ?></h4>
                    <?php foreach ($order->products as $product) : ?>
                        <tr>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->price) ?></td>
                            <td><?= h($product->description) ?></td>
                            <td class="actions">
                                <?= $this->Form->create(null, ['url' => ['controller' => 'OrdersProducts', 'action' => 'edit', $product->_joinData->id]]) ?>
                            <?php echo $this->Form->control('quantity', [
                                    'class' => 'form-control',
                                    'type' => 'number',
                                    'step' => '1',
                                    'min' => '1',
                                    'max' => '100',
                                    'label' => 'Current quantity = '.$product->_joinData->quantity,
                                    'default' => $product->_joinData->quantity,
                                ]); ?>
                            </td>
                            <td
<!--                                --><?php //= $this->Html->link(__('Update Quantity'), ['controller' => 'OrdersProducts', 'action' => 'edit', $product->_joinData->id], ['class' => 'btn btn-primary']) ?>
                                <?= $this->Form->button(__('Update quantity'), ['class' => 'btn btn-success']) ?>
                                <?= $this->Html->link(__('Remove from order'), ['class' => 'btn btn-danger', 'controller' => 'OrdersProducts', 'action' => 'deleteRelation', $order->id, $product->id]) ?>
                                <?= $this->Form->end() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>



                <?= $this->Form->postLink(
                    __('Delete Order'),
                    ['action' => 'delete', $order->id],
                    ['confirm' => __('Are you sure you want to delete order:# {0}?', $order->id), 'class' => 'btn btn-danger']
                ) ?>
            </div>
        </aside>
    </div>
<?php endif; ?>
