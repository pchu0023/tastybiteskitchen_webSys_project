<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $payment->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']
                ) ?>
                <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="payments form content">
                <?= $this->Form->create($payment) ?>
                <fieldset>
                    <legend><?= __('Edit Payment') ?></legend>
                    <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('method');
                    echo $this->Form->control('date');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php endif; ?>
