<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="payments view content">
                <h3><?= h($payment->method) ?></h3>
                <table>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= h($payment->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User') ?></th>
                        <td><?= $payment->hasValue('user') ? $this->Html->link($payment->user->type, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Method') ?></th>
                        <td><?= h($payment->method) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Amount') ?></th>
                        <td><?= $this->Number->format($payment->amount) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Date') ?></th>
                        <td><?= h($payment->date) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Related Orders') ?></h4>
                    <?php if (!empty($payment->orders)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Payment Id') ?></th>
                                    <th><?= __('Delivery Id') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($payment->orders as $order) : ?>
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
