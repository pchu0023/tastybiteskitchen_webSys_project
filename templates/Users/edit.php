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
        <div class="column column-80">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <br />
                    <legend class="h1"><?= __('Edit User') ?></legend>
                    <aside class="column">
                        <div class="side-nav">
                            <?= $this->Html->link(__('Go Back'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Form->postLink(
                                __('Delete User'),
                                ['action' => 'delete', $user->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
                            ) ?>
                        </div>
                        <br />
                    </aside>
                    <h5 class="d-flex justify-content-between border-bottom">
                        <span>
                            User Type *
                        </span>
                    </h5>
                    <div class="dropdown">
                        <?php echo $this->Form->control('type', ["class" => 'form-select', 'options' => ['emp' => 'Employee', 'cust' => 'Customer'], 'label' => false]); ?>
                    </div>
                    <br />
                    <div class="row">
                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                            <span>
                                Name *
                            </span>
                        </h5>
                        <div class="col">
                            <?php echo $this->Form->control('first_name', ['class' => 'form-control','label' => false, 'placeholder' => 'First Name']);?>
                        </div>
                        <div class="col">
                            <?php echo $this->Form->control('last_name', ['class' => 'form-control','label' => false, 'placeholder' => 'Surname']); ?>
                        </div>
                    </div>
                    <br />
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Email Address *
                        </span>
                    </h5>
                    <?php echo $this->Form->control('email', ['class' => 'form-control','label' => false, 'placeholder' => 'Email']); ?>
                    <br />
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Password
                        </span>
                    </h5>
                        <p>Please have the user use "Reset Your Password".</p>
                    <br />
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Address
                        </span>
                    </h5>
                    <?php echo $this->Form->control('address', ['class' => 'form-control','label' => false, 'placeholder' => '1234 Main Street, Suburb 3000']); ?>
                    <br />
                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Phone Number
                        </span>
                    </h5>
                    <?php echo $this->Form->control('phone_number', ['class' => 'form-control','label' => false, 'placeholder' => '0400000000']); ?>
                </fieldset>
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
