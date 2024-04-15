<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menu> $menus
 */
?>
<div class="menus index content">
    <!-- display for admin -->
    <?php if ($this->Identity->get('type') === "emp") : ?>
        <br />
        <?= $this->Html->link(__('New Menu'), ['action' => 'add'], ['class' => 'btn btn-primary py-sm-2 px-sm-5 me-1']) ?>
        <br />
        <br />
        <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Active Displayed Menus') ?></h3>

        <!-- display for customer -->
    <?php else : ?>
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Current Active Menu</h1>
            </div>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <!-- If there is only one menu, just show it -->
                <?php
                $active_array = array();
                foreach ($menus as $menu) :
                    if ($menu->active === TRUE) :
                        array_push($active_array, $menu);
                    endif;
                endforeach;
                if (sizeof($active_array) == 1) : ?>
                    <tr>
                        <td><?= h($active_array[0]->name) ?></td>
                        <td><?= h($active_array[0]->description) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $active_array[0]->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                            <?php if ($this->Identity->get('type') === "emp") : ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $active_array[0]->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $active_array[0]->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <!-- Else, give the option to view each menu -->
                <?php else : ?>
                    <?php foreach ($menus as $menu) : ?>
                        <?php if ($menu->active === TRUE) : ?>
                            <tr>
                                <td><?= h($menu->name) ?></td>
                                <td><?= h($menu->description) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                                    <?php if ($this->Identity->get('type') === "emp") : ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <br />
    <?php if ($this->Identity->get('type') === "emp") : ?>
        <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Inactive Menus') ?></h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('description') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $menu) : ?>
                        <?php if ($menu->active === FALSE) : ?>
                            <tr>
                                <td><?= h($menu->name) ?></td>
                                <td><?= h($menu->description) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger py-sm-2 px-sm-3 me-2']) ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>