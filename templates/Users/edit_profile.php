<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
    <div class="row">
    <div class="column column-80">

    <legend><?= __('Edit Profile') ?></legend>
                    
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                   
            
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
                        Email Address and Password
                        </span>
                    </h6>
                        <p>Please create a new account if your email changed, and reset your password in registration page.</p>
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
                    <div class="d-grid">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success'] ) ?>
                    
                        <?= $this->Form->end() ?>
                        

                    </div>
                    <br />
                    <br />
                </fieldset>
            </div>
        </div>
    </div>
