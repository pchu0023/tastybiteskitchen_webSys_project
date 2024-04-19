<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php if ($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>
    <div class="row">
        <div class="column column-80">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Add User') ?></legend>
                    <aside class="column">
                        <div class="side-nav">
                            <?= $this->Html->link(__('Go Back To All Users'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                        </div>
                        <br />
                    </aside>
                    <h6 class="d-flex border-bottom">
                        <span>User Type *</span>
                    </h6>
                    <div class="dropdown">
                        <?php echo $this->Form->control('type', ["class" => 'form-select', 'options' => ['emp' => 'Employee', 'cust' => 'Customer'], 'label' => false]); ?>
                    </div>
                    <br />
                    <div class="row">
                        <h6 class="d-flex border-bottom">
                            <span>Name *</span>
                        </h6>
                        <div class="col">
                            <?php echo $this->Form->control('first_name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'First Name']); ?>
                        </div>
                        <div class="col">
                            <?php echo $this->Form->control('last_name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Surname']); ?>
                        </div>
                    </div>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span> Email Address *</span>
                    </h6>
                    <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Email']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span> Password *
                        </span>
                    </h6>
                    <?php echo $this->Form->control('password', [
                        'value' => '',  // Ensure password is not sending back to the client side
                        'class' => 'form-control needs-validation',
                        'novalidate action' => "#",
                        'minlength' => "8",
                        'placeholder' => 'Password',
                        'label' => false
                    ]); ?>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        The password must be between 8 and 128 characters long, contain at least one symbol, and must not contain emojis.
                    </small>
                    <br />
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Address</span>
                    </h6>
                    <?php echo $this->Form->control('address', ['class' => 'form-control', 'label' => false, 'placeholder' => '1234 Main Street, Suburb 3000']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Phone Number</span>
                    </h6>
                    <?php echo $this->Form->control('phone_number', ['class' => 'form-control', 'label' => false, 'placeholder' => '0400000000']); ?>
                </fieldset>
                <br />
                <br />
                <div class="d-grid">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success btn-block']) ?>
                </div>
                <?= $this->Form->end() ?>
                <br />
                <br />
            </div>
        </div>
    </div>
<?php endif; ?>