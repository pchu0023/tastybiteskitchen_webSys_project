<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->layout = 'login';
$this->assign('title', 'Register new user');
?>
<div class="container register">
    <div class="column column-50 column-offset-25">
        <div class="users form content">

            <?= $this->Form->create($user) ?>

            <fieldset>

                <h1 class="d-flex justify-content-between">Register New Account</h1>
                <br />
                <h3 style="font-weight: 500">Already have an account? <u style="font-weight: 600"><?= $this->Html->link('Sign in here.', ['controller' => 'Auth', 'action' => 'login']) ?></u></h3>
                <hr class="hr-between-buttons">

                <?= $this->Flash->render() ?>
                <br />
                <h2 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Account Details
                        </span>
                </h2>

                <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email Address', 'type' => 'email']); ?>
                <div class="row">
                    <?php
                    echo $this->Form->control('password', [
                        'value' => '',  // Ensure password is not sending back to the client side
                        'class' => 'form-control',
                        'placeholder' => 'Password'
                    ]);
                    ?>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Your password must be 12 characters long, contain letters and numbers, and must not contain emojis.
                    </small>
                    <?php
                    // Validate password by repeating it
                    echo $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'value' => '',  // Ensure password is not sending back to the client side
                        'label' => 'Retype Password',
                        'class' => 'form-control',
                        'placeholder' => 'Retype Password'
                    ]);
                    ?>
                </div>
                <br />

                <h2 class="d-flex justify-content-between border-bottom pb-2">
                        <span>
                            Personal Details
                        </span>
                </h2>
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('first_name', ['class' => 'form-control','label' => '', 'placeholder' => 'First Name']); ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('last_name', ['class' => 'form-control','label' => '', 'placeholder' => 'Last Name']); ?>
                    </div>
                </div>
            </fieldset>
            <br />

            <div class="d-grid">
                <?= $this->Form->button('Register', ['class' => 'button btn-success btn-block']) ?>
            </div>
            <?= $this->Form->end() ?>

        </div>
    </div>
</div>
