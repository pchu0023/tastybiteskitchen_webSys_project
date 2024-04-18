<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>

    <div class="row">
        <aside class="column">
            <br />
            <div class="side-nav">
                <?= $this->Html->link(__('Show All Users'), ['action' => 'index'], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                </div>
            <br />
        </aside>
        <div class="column column-80">
            <div class="users view content">
                <h3 class="d-flex justify-content-between border-bottom pb-1">View User</h3>
                <aside class="column">
                    <div class="side-nav">
                        <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                        <?php if($this->Identity->get('id') != $user->id) : ?>
                            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger py-sm-2 px-sm-3 me-2']) ?>
                        <?php endif; ?>
                    </div>
                    <br />
                </aside>
                <div class="w-100 d-flex flex-column text-start ps-4">

                    <h5 class="d-flex justify-content-between border-bottom">
                        <span>
                            User Type
                        </span>
                    </h5>
                    <div>
                        <?= h($user->type) ?>
                    </div>
                    <br />

                    <h5 class="d-flex justify-content-between border-bottom">
                        <span>
                            Name
                        </span>
                    </h5>
                    <div>
                        <?= h($user->first_name) ?> <?= h($user->last_name) ?>
                    </div>
                    <br />

                    <h5 class="d-flex justify-content-between border-bottom">
                        <span>
                            Email
                        </span>
                    </h5>
                    <div>
                        <?= h($user->email) ?>
                    </div>
                    <br />

                    <h5 class="d-flex justify-content-between border-bottom">
                        <span>
                            Address
                        </span>
                    </h5>
                    <div>
                        <?= h($user->address) ?>
                    </div>
                    <br />

                    <h5 class="d-flex justify-content-between border-bottom">
                        <span>
                            Phone Number
                        </span>
                    </h5>
                    <div>
                        <?= h($user->phone_number) ?>
                    </div>

                </div>
                <br />
                <div class="row">
                    <div class="col">
                        <div class="related">
                            <h4 class="d-flex justify-content-between border-bottom pb-1">
                                <span>Related Payments</span>
                            </h4>
                            <?php if (!empty($user->payments)) : ?>
                                <div class="table-responsive">
                                    <table>
                                        <tr>
                                            <th><?= __('Id') ?></th>
                                            <th><?= __('User Id') ?></th>
                                            <th><?= __('Amount') ?></th>
                                            <th><?= __('Method') ?></th>
                                            <th><?= __('Date') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        <?php foreach ($user->payments as $payment) : ?>
                                            <tr>
                                                <td><?= h($payment->id) ?></td>
                                                <td><?= h($payment->user_id) ?></td>
                                                <td><?= h($payment->amount) ?></td>
                                                <td><?= h($payment->method) ?></td>
                                                <td><?= h($payment->date) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payment->id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payment->id]) ?>
                                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="related">
                            <h4 class="d-flex justify-content-between border-bottom pb-1">
                                <span>Related Orders</span>
                            </h4>
                            <?php if (!empty($user->orders)) : ?>
                                <div class="table-responsive">
                                    <table>
                                        <tr>
                                            <th><?= __('Id') ?></th>
                                            <th><?= __('User Id') ?></th>
                                            <th><?= __('Amount') ?></th>
                                            <th><?= __('Method') ?></th>
                                            <th><?= __('Date') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        <?php foreach ($user->payments as $payment) : ?>
                                            <tr>
                                                <td><?= h($payment->id) ?></td>
                                                <td><?= h($payment->user_id) ?></td>
                                                <td><?= h($payment->amount) ?></td>
                                                <td><?= h($payment->method) ?></td>
                                                <td><?= h($payment->date) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payment->id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payment->id]) ?>
                                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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
        </div>
    </div>
<?php endif; ?>
