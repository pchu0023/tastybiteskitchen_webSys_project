<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
                    ['action' => 'delete', $user->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
                ) ?>
                <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Edit User') ?></legend>
                    <h5 class="d-flex justify-content-between border-bottom">
                        <span>
                            User Type
                        </span>
                    </h5>
                    <div class="dropdown">
                        <?php echo $this->Form->control('type', ["class" => 'form-select', 'options' => ['emp' => 'Employee', 'cust' => 'Customer'], 'label' => '']); ?>
                    </div>
                    <div class="row">
                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                            <span>
                                Name
                            </span>
                        </h5>
                        <div class="col">
                            <?php echo $this->Form->control('first_name', ['class' => 'form-control','label' => '', 'placeholder' => 'First Name']);?>
                        </div>
                        <div class="col">
                            <?php echo $this->Form->control('last_name', ['class' => 'form-control','label' => '', 'placeholder' => 'Surname']); ?>
                        </div>
                    </div>
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Email Address
                        </span>
                    </h5>
                    <?php echo $this->Form->control('email', ['class' => 'form-control','label' => '', 'placeholder' => 'Email']); ?>
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Password
                        </span>
                    </h5>
                    <?php echo $this->Form->control('password', ['class' => 'form-control','label' => '', 'placeholder' => 'Password', 'readonly']); ?>
                        <p>Please have the user use "Reset Your Password".</p>
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Address
                        </span>
                    </h5>
                    <?php echo $this->Form->control('address', ['class' => 'form-control','label' => '', 'placeholder' => '1234 Main Street, Suburb 3000']); ?>
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Phone Number
                        </span>
                    </h5>
                    <?php echo $this->Form->control('phone_number', ['class' => 'form-control','label' => '', 'placeholder' => '0400000000']); ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php endif; ?>
