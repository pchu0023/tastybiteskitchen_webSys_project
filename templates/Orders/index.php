<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>

<div class="menus index content">
    <!-- display for admin -->
    <?php $this->layout = 'admin_default'; ?>
    <br />
    <?= $this->Html->link(__('Change multiple order statuses'), ['action' => 'multipleOrderStatus'], ['class' => 'btn btn-secondary float-right']) ?>
    <br />
    <br />

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Status: Unpaid') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('order id') ?></th>
                <th><?= $this->Paginator->sort('payment id') ?></th>
                <th><?= $this->Paginator->sort('delivery id') ?></th>
<!--                ToDo - add paginators for delivery requested date and address-->

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <!-- If there is only one order, just show it -->
            <?php
            $active_array = array();
            foreach ($orders as $order) :
                //if order has payment
                if ($order->status == 'Unpaid') :
                    array_push($active_array, $order);
                endif;
            endforeach;
            if (sizeof($active_array) == 1) : ?>
                <tr>
                    <td style="max-width:100px; word-wrap:break-word;"><?= h($active_array[0]->id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->payment_id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->delivery_id) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $active_array[0]->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                        <?php if ($this->Identity->get('type') === "emp") : ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $active_array[0]->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $active_array[0]->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Else, give the option to view each order -->
            <?php else : ?>
                <?php foreach ($orders as $order) : ?>
            <?php if ($order->status == 'Unpaid') : ?>
                        <tr>
                            <td style="max-width:100px; word-wrap:break-word;"><?= h($order->id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->payment_id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->delivery_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete {0}?', $order->name), 'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>


    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Status: Payment Received') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('order id') ?></th>
                <th><?= $this->Paginator->sort('payment id') ?></th>
                <th><?= $this->Paginator->sort('delivery id') ?></th>
                <!--                ToDo - add paginators for delivery requested date and address-->

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <!-- If there is only one order, just show it -->
            <?php
            $active_array = array();
            foreach ($orders as $order) :
                //if order has payment
                if ($order->status == 'Payment_received') :
                    array_push($active_array, $order);
                endif;
            endforeach;
            if (sizeof($active_array) == 1) : ?>
                <tr>
                    <td style="max-width:100px; word-wrap:break-word;"><?= h($active_array[0]->id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->payment_id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->delivery_id) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $active_array[0]->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                        <?php if ($this->Identity->get('type') === "emp") : ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $active_array[0]->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $active_array[0]->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Else, give the option to view each order -->
            <?php else : ?>
                <?php foreach ($orders as $order) : ?>
                    <?php if ($order->status == 'Payment_received') : ?>
                        <tr>
                            <td style="max-width:100px; word-wrap:break-word;"><?= h($order->id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->payment_id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->delivery_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete {0}?', $order->name), 'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Status: Order Packed') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('order id') ?></th>
                <th><?= $this->Paginator->sort('payment id') ?></th>
                <th><?= $this->Paginator->sort('delivery id') ?></th>
                <!--                ToDo - add paginators for delivery requested date and address-->

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <!-- If there is only one order, just show it -->
            <?php
            $active_array = array();
            foreach ($orders as $order) :
                //if order has payment
                if ($order->status == 'Order_packed') :
                    array_push($active_array, $order);
                endif;
            endforeach;
            if (sizeof($active_array) == 1) : ?>
                <tr>
                    <td style="max-width:100px; word-wrap:break-word;"><?= h($active_array[0]->id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->payment_id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->delivery_id) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $active_array[0]->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                        <?php if ($this->Identity->get('type') === "emp") : ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $active_array[0]->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $active_array[0]->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Else, give the option to view each order -->
            <?php else : ?>
                <?php foreach ($orders as $order) : ?>
                    <?php if ($order->status == 'Order_packed') : ?>
                        <tr>
                            <td style="max-width:100px; word-wrap:break-word;"><?= h($order->id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->payment_id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->delivery_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete {0}?', $order->name), 'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Status: Order Dispatched') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('order id') ?></th>
                <th><?= $this->Paginator->sort('payment id') ?></th>
                <th><?= $this->Paginator->sort('delivery id') ?></th>
                <!--                ToDo - add paginators for delivery requested date and address-->

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <!-- If there is only one order, just show it -->
            <?php
            $active_array = array();
            foreach ($orders as $order) :
                //if order has payment
                if ($order->status == 'Order_dispatched') :
                    array_push($active_array, $order);
                endif;
            endforeach;
            if (sizeof($active_array) == 1) : ?>
                <tr>
                    <td style="max-width:100px; word-wrap:break-word;"><?= h($active_array[0]->id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->payment_id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->delivery_id) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $active_array[0]->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                        <?php if ($this->Identity->get('type') === "emp") : ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $active_array[0]->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $active_array[0]->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Else, give the option to view each order -->
            <?php else : ?>
                <?php foreach ($orders as $order) : ?>
                    <?php if ($order->status == 'Order_dispatched') : ?>
                        <tr>
                            <td style="max-width:100px; word-wrap:break-word;"><?= h($order->id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->payment_id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->delivery_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete {0}?', $order->name), 'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Status: Order Completed') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('order id') ?></th>
                <th><?= $this->Paginator->sort('payment id') ?></th>
                <th><?= $this->Paginator->sort('delivery id') ?></th>
                <!--                ToDo - add paginators for delivery requested date and address-->

                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <!-- If there is only one order, just show it -->
            <?php
            $active_array = array();
            foreach ($orders as $order) :
                //if order has payment
                if ($order->status == 'Order_completed') :
                    array_push($active_array, $order);
                endif;
            endforeach;
            if (sizeof($active_array) == 1) : ?>
                <tr>
                    <td style="max-width:100px; word-wrap:break-word;"><?= h($active_array[0]->id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->payment_id) ?></td>
                    <td style="max-width: 400px; word-wrap: break-word;"><?= h($active_array[0]->delivery_id) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $active_array[0]->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                        <?php if ($this->Identity->get('type') === "emp") : ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $active_array[0]->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $active_array[0]->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <!-- Else, give the option to view each order -->
            <?php else : ?>
                <?php foreach ($orders as $order) : ?>
                    <?php if ($order->status == 'Order_completed') : ?>
                        <tr>
                            <td style="max-width:100px; word-wrap:break-word;"><?= h($order->id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->payment_id) ?></td>
                            <td style="max-width: 400px; word-wrap: break-word;"><?= h($order->delivery_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $order->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete {0}?', $order->name), 'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>


    <br />
</div>
<?php endif; ?>
