<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu[]|\Cake\Collection\CollectionInterface $menus
 */
?>

<?= $this->Form->create(null, ['url' => ['controller' => 'Menus', 'action' => 'updateAllActiveCaterState']]) ?>
<div class="menus index content">
    <!-- display for admin -->
    <?php $this->layout = 'admin_default'; ?>
    <br />
    <?= $this->Html->link(__('Back To All Menu'), ['action' => 'adminIndex'], ['class' => 'btn btn-primary float-right']) ?>
    <br />
    <br />
    <h4>* Tick all active menu and submit to update current active menu *</h4>
    <br />

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Menus') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= __('Active?') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu) : ?>
                    <tr>
                        <td style="max-width:100px; word-wrap:break-word;"><?= h($menu->name) ?></td>
                        <td style="max-width: 300px; word-wrap: break-word;"><?= h($menu->description) ?></td>
                        <td><?= $this->Form->checkbox("active[$menu->id]", ['checked' => $menu->active]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br/>

    <div class="d-grid">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    </div>
    <br/>
    <br/>
</div>
<?= $this->Form->end() ?>
