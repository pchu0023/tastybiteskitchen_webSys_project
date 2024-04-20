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
    <div class="column column-80">

    <legend><?= __('Edit User') ?></legend>
                    <aside class="column">
                        <div class="side-nav">
                            <?= $this->Html->link(__('Go Back To All Users'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Form->postLink(
                                    __('Delete User'),
                                    ['action' => 'delete', $user->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']
                                ) ?>
                        </div>
                        <br />
                    </aside>
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                   
                <h6 class="d-flex border-bottom">
                        <span>
                            User Type *
                        </span>
                    </h6>
                    <div class="dropdown">
                        <?php echo $this->Form->control('type', ["class" => 'form-select', 'options' => ['emp' => 'Employee', 'cust' => 'Customer'], 'label' => false]); ?>
                    </div>
                    <br />
                    <div class="row">
                    <h6 class="d-flex border-bottom">
                            <span>
                                Name *
                            </span>
                        </h6>
                        <div class="col">
                            <?php echo $this->Form->control('first_name', ['class' => 'form-control','label' => false, 'placeholder' => 'First Name']);?>
                        </div>
                        <div class="col">
                            <?php echo $this->Form->control('last_name', ['class' => 'form-control','label' => false, 'placeholder' => 'Surname']); ?>
                        </div>
                    </div>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>
                            Email Address *
                        </span>
                    </h6>
                    <?php echo $this->Form->control('email', ['class' => 'form-control','label' => false, 'placeholder' => 'Email']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>
                            Password
                        </span>
                    </h6>
                        <p>Please have the user use "Reset Your Password".</p>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>
                            Address
                        </span>
                    </h6>
                    <?php echo $this->Form->control('address', ['class' => 'form-control','label' => false, 'placeholder' => '1234 Main Street, Suburb 3000']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>
                            Phone Number
                        </span>
                    </h6>
                    <?php echo $this->Form->control('phone_number', ['class' => 'form-control','label' => false, 'placeholder' => '0400000000']); ?>

                    <br />
                    <div class="d-col">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success'] ) ?>
                    
                        <?= $this->Form->end() ?>
                        

                    </div>
                    <br />
                    <br />
                </fieldset>
            </div>
        </div>
    </div>
<?php endif; ?>
