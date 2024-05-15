<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php if ($this->Identity->get('type') != "emp"): ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else: ?>
    <div class="row">
        <div class="column-responsive column-80">
            <div class="payments view content">
                <!-- Button Group -->
                <div style="margin-bottom: 20px; display: flex; gap: 10px;">
                    <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?>
                    <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
                    <?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?>
                    <?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?>
                </div>
        <div class="column-responsive column-80">
            <div class="payments view content">
                <h3 class="section-title <?= $this->request->getParam('action') === 'view' ? 'fw-medium' : '' ?>"><?= h($payment->method) ?></h3>
                <table class="table">
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= h($payment->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User') ?></th>
                        <td>
                            <?php foreach ($users as $user): ?>
                                <?php if ($user->id == $payment->user_id): ?>
                                    <?= $this->Html->link($user->type, ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
<!--                        <td>--><?php //= $payment->hasValue('user') ? $this->Html->link($payment->user->type, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?><!--</td>-->
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
                    <h4 class="section-title <?= $this->request->getParam('action') === 'view' ? 'fw-medium' : '' ?>"><?= __('Related Orders') ?></h4>
                    <?php if (!empty($payment->orders)): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Payment Id') ?></th>
                                    <th><?= __('Delivery Id') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($payment->orders as $orders): ?>
                                <tr>
                                    <td><?= h($orders->id) ?></td>
                                    <td><?= h($orders->payment_id) ?></td>
                                    <td><?= h($orders->delivery_id) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <p><?= __('No related orders found.') ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
