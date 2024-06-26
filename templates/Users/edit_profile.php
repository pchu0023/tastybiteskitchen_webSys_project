<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column column-80">

        <legend><?= __('Edit Profile') ?></legend>
        <a href="<?= $this->Url->build('/') ?>" class='btn btn-primary'>Back Home</a>

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
                        <?= $this->Form->control('first_name', [
                            'label' => false,
                            'required' => true,
                            'class' => 'form-control',
                            'placeholder'=> 'First Name',
                            'pattern' => "^[A-Za-z]+$",
                            'title' => 'Last Name must contain only letters.',
                        ]) ?> </div>
                    <div class="col">
                        <?= $this->Form->control('last_name', [
                            'label' => false,
                            'required' => true,
                            'class' => 'form-control',
                            'placeholder'=> 'Last Name',

                            'pattern' => "^[A-Za-z]+$",
                            'title' => 'Last Name must contain only letters.',
                        ]); ?> </div>
                </div>
                <br />
                <h6 class="d-flex border-bottom">
                    <span>
                        Email Address and Password
                    </span>
                </h6>
                <p>Please create a new account if your email changed, and reset your password in registration page.</p>
                <p class="form-control-static"> Current Email: <strong><?php echo $user->email; ?></strong></p>

                <h6 class="d-flex border-bottom">
                    <span>
                        Address
                    </span>
                </h6>
                <?= $this->Form->control('address', ['label' => false, 'required' => false, 'class' => 'form-control']) ?>
                <br />
                <h6 class="d-flex border-bottom">
                    <span>
                        Phone Number
                    </span>
                </h6>
                <?= $this->Form->control('phone_number', [
                    'label' => false,
                    'type' => 'tel',
                    'required' => true,
                    'placeholder' => '04 0000 0000',
                    'class' => 'form-control',
                    'pattern' => '^(?:\d{2}\s?\d{4}\s?\d{4}|\d{10})$',
                    'title' => 'Phone number must be in the format "04 0000 0000" or "0400000000".',
                    'required' => false // make the field optional

                ]); ?>

                </h6>

                <br />
                <div class="d-grid">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>

                    <?= $this->Form->end() ?>


                </div>
                <br />
                <br />
            </fieldset>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        const phoneInput = document.getElementById('phone');

        phoneInput.addEventListener('input', function(e) {
            var value = e.target.value;
            var formatted = value.replace(/[^\d\s]/g, '')
                .replace(/\s+/g, ' ')
                .trim()
                .substring(0, 12);


            if (formatted.length === 2 || formatted.length === 7) {
                formatted += ' ';
            }

            phoneInput.value = formatted;
        });
    });
</script>