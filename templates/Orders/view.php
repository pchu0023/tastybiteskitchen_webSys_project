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
                    <td> Current Status:  <?= h($order->status) ?> </td>
                </tr>
                <table>
                    <tr>
                        <th><?= __('Product Name') ?></th>
                        <th><?= __('Price') ?></th>
                        <th><?= __('Description') ?></th>
                        <th><?= __('Quantity') ?></th>
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
                                    'readonly',
                                    'label' => false,
                                    'default' => $product->_joinData->quantity,
                                ]); ?>
                            </td>
                            <td
                            <!--                                --><?php //= $this->Html->link(__('Update Quantity'), ['controller' => 'OrdersProducts', 'action' => 'edit', $product->_joinData->id], ['class' => 'btn btn-primary']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </aside>
    </div>
<?php endif; ?>
