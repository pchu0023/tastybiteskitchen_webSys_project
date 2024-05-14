<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 * @var array $statuses
 */

// Available statuses for filtering
$statuses = [
    'Unpaid' => 'Unpaid',
    'Payment_received' => 'Payment Received',
    'Order_packed' => 'Order Packed',
    'Order_dispatched' => 'Order Dispatched',
    'Order_completed' => 'Order Completed',
    'Cancelled' => 'Order Cancelled',
];

// Get the selected status from the query string, default to 'Unpaid'
$selectedStatus = $this->request->getQuery('status', 'Unpaid');

// Convert PaginatedResultSet to array for filtering
$ordersArray = iterator_to_array($orders);

?>
<?php if ($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>

    <div class="order index content">
        <!-- display for admin -->
        <?php $this->layout = 'admin_default'; ?>
        <?= $this->Html->link(__('Change multiple order statuses'), ['action' => 'multipleOrderStatus'], ['class' => 'btn btn-secondary float-right']) ?>
        <br />
        <br />

        <!-- Filter Dropdown -->
        <div class="form-group">
            <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
            <label class="mr-2" for="statusFilter"><?= __('Filter by Status') ?>:</label>
            <?= $this->Form->control('status', [
                'type' => 'select',
                'options' => $statuses,
                'empty' => false,
                'default' => $selectedStatus,
                'id' => 'statusFilter',
                'label' => false,
                'class' => 'form-control mr-2'
            ]) ?>
            <br>
            <?= $this->Form->submit(__('Confirm Status'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
                <br>
        <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Status') ?>: <?= h($statuses[$selectedStatus]) ?></h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('order id') ?></th>
                        <th><?= $this->Paginator->sort('receiver_name') ?></th>
                        <th><?= $this->Paginator->sort('receiver_phone') ?></th>
                        <th><?= $this->Paginator->sort('delivery_address') ?></th>
                        <th><?= $this->Paginator->sort('requested_date') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filteredOrders = array_filter($ordersArray, function ($order) use ($selectedStatus) {
                        return $order->status == $selectedStatus;
                    });

                    if (empty($filteredOrders)) : ?>
                        <tr>
                            <td colspan="6" class="text-center"><?= __('No orders found with status') ?>: <?= h($statuses[$selectedStatus]) ?></td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($filteredOrders as $order) : ?>
                            <tr>
                                <td style="max-width:100px; word-wrap:break-word;"><?= h($order->id) ?></td>
                                <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->receiver_name) ?></td>
                                <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->receiver_phone) ?></td>
                                <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->delivery_address) ?></td>
                                <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->requested_date) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'btn btn-sm btn-info']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'btn btn-sm btn-danger']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
