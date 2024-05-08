<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menu> $menus
 */
?>
<div class="menus index content">

    <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url('<?= htmlspecialchars($websiteContent->background_image) ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Basic Active Menu</h1>


        </div>

    </div>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($menus as $menu) : ?>
            <?php if ($menu->active === TRUE) : ?>
                <div class="col">

                    <div class="card" >
                        <div class="card-body">
                            <h3 class="card-title text-center"><?= h($menu->name) ?></h3>
                            <p class="card-text text-center mb-4"><?= h($menu->description) ?></p>
                            <div class="text-center">
                                <?= $this->Html->link(__('VIEW'), ['action' => 'view', $menu->id], ['class' => 'btn btn-primary py-2 px-3 me-2']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<br>
<br>
</div>