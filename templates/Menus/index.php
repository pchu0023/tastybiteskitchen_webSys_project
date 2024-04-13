<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Menu> $menus
 */
?>
<div class="menus index content">
    <?php if($this->Identity->get('type') === "emp") : ?>
        <br />
        <?= $this->Html->link(__('New Menu'), ['action' => 'add'], ['class' => 'btn btn-primary py-sm-2 px-sm-5 me-1']) ?>
        <br />
    <?php endif; ?>
    <br />
    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Active Menus') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu): ?>
                    <?php if($menu->active === TRUE) : ?>
                        <tr>
                            <td><?= h($menu->name) ?></td>
                            <td><?= h($menu->description) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>
                                <?php if($this->Identity->get('type') === "emp") : ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br />
    <?php if($this->Identity->get('type') === "emp") : ?>
        <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Inactive Menus') ?></h3>
        <div class="table-responsive">
            <table>
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($menus as $menu): ?>
                    <?php if($menu->active === FALSE) : ?>
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
