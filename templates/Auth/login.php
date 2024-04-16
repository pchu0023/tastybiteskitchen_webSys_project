<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');

$this->layout = 'login';
$this->assign('title', 'Login');
?>
<div class="container login" >
    <div class="row" >
        <div class="column column-50 column-offset-25">
            <div class="users form content">

                <?= $this->Form->create() ?>

                <fieldset>

                    <h1 class="d-flex justify-content-between">Log In</h1>
                    <br />
                    <h3 style="font-weight: 500">New to Tasty Bites Kitchen? <u style="font-weight: 600"><?= $this->Html->link('Sign up here.', ['controller' => 'Auth', 'action' => 'register']) ?></u></h3>
                    <hr class="hr-between-buttons">

                    <?= $this->Flash->render() ?>

                    <?php
                    /*
                     * NOTE: regarding 'value' config in the login page form controls
                     * In this demo the email and password fields will be filled by demo account
                     * credentials when debug mode is on. You should NOT do that in your production
                     * systems. Also it's a good practice to clear (set password value to empty)
                     * in the view so when an error occurred with form validation, the password
                     * values are always cleared.
                     */
                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'required' => true,
                        'autofocus' => true,
                        'value' => $debug ? "test@example.com" : "",
                        'placeholder' => 'Email Address'
                    ]);
                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'value' => $debug ? 'password' : '',
                        'placeholder' => 'Password'
                    ]);
                    ?>
                </fieldset>
                <p><u style="font-weight: 600"><?= $this->Html->link('Forgotten your password?', ['controller' => 'Auth', 'action' => 'forgetPassword']) ?></u></p>
                <hr class="hr-between-buttons">
                <div class="d-grid"><?= $this->Form->button('Login', ['class' => 'button btn-success btn-block']) ?></div>
<!--                --><?php //= $this->Html->link('Go to Homepage', '/', ['class' => 'button btn-secondary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
