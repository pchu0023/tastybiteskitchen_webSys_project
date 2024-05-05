<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<?php if ($this->Identity->get('type') != "emp") : ?>

    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>

    <div class="row">
        <div class="column column-80">
        <legend><?= __('Edit Menu') ?></legend>
                    <aside class="column">
                        <div class="side-nav">
                            <?= $this->Html->link(__('Go Back to All Menus'), ['action' => 'admin_index'], ['class' => 'btn btn-primary']) ?>
                            <?= $this->Form->postLink(
                        __('Delete Menu'),
                        ['action' => 'delete', $menu->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger']
                    ) ?>
                        </div>
                        <br />
                    </aside>
            <div class="menus form content">
                <?= $this->Form->create($menu) ?>
                <fieldset>
                    
                    <h6 class="d-flex border-bottom">
                        <span>Name *</span>
                    </h6>
                    <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Menu Name']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Description *</span>
                    </h6>
                    <?php echo $this->Form->control('description', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Menu Description', 'rows' => 5]); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Active</span>
                    </h6>
                    <?php echo $this->Form->control('active', ['label' => false, 'class' => 'd-flex flex-column']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Catering</span>
                    </h6>
                    <?php echo $this->Form->control('catering', ['label' => false, 'class' => 'd-flex flex-column']); ?>
                    <br />

                    <!-- <h6 class="d-flex border-bottom">
                        <span>Products Included</span>
                    </h6>
                    <?php echo $this->Form->control('products._ids', ['options' => $products, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                    <br /> -->
                </fieldset>
                <div class="d-grid">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>

                </div>
                <br />
            </div>
        </div>
    </div>
<?php endif; ?>