<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>

    <br />
    <div class="row">
        <?= $this->Html->link(__('Add New User'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    </div>
    <br />
    <div class="users index content">
        <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Employees') ?></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('first_name') ?></th>
                        <th><?= $this->Paginator->sort('last_name') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <?php if($user->type === "emp") : ?>
                            <tr>
                                <td><?= h($user->first_name) ?></td>
                                <td><?= h($user->last_name) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-primary float-right']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary float-right']) ?>
                                    <?= $this->Html->link(__('Go Back'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                                    <?php if($this->Identity->get('id') != $user->id) : ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger float-right']) ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            </div>

        <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Customers') ?></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <?php if($user->type != "emp") : ?>
                        <tr>
                            <td><?= h($user->first_name) ?></td>
                            <td><?= h($user->last_name) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->address) ?></td>
                            <td><?= h($user->phone_number) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-primary float-right']) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary float-right']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger float-right']) ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
