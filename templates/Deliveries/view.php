<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Delivery $delivery
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Delivery'), ['action' => 'edit', $delivery->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Delivery'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Deliveries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Delivery'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="deliveries view content">
                <h3><?= h($delivery->type) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= h($delivery->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Type') ?></th>
                        <td><?= h($delivery->type) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Date') ?></th>
                        <td><?= h($delivery->date) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Orders') ?></h4>
                    <?php if (!empty($delivery->orders)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Payment Id') ?></th>
                                    <th><?= __('Delivery Id') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($delivery->orders as $order) : ?>
                                    <tr>
                                        <td><?= h($order->id) ?></td>
                                        <td><?= h($order->payment_id) ?></td>
                                        <td><?= h($order->delivery_id) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $order->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $order->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
