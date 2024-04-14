<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <p> You do not have permission to view this resource. </p>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $menu->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'side-nav-item']
                ) ?>
                <?= $this->Html->link(__('List Menus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="menus form content">
                <?= $this->Form->create($menu) ?>
                <fieldset>
                    <legend><?= __('Edit Menu') ?></legend>
                    <h6 class="d-flex border-bottom">
                        <span>Name</span>
                    </h6>
                    <?php echo $this->Form->control('name', ['label' => '', 'class' => 'd-flex flex-column']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Description</span>
                    </h6>
                    <?php echo $this->Form->control('description', ['label' => '', 'class' => 'd-flex flex-column', 'rows' => '5']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Active</span>
                    </h6>
                    <?php echo $this->Form->control('active', ['label' => '', 'class' => 'd-flex flex-column']); ?>
                    <br />
                    <h6 class="d-flex border-bottom">
                        <span>Products Included</span>
                    </h6>
                    <?php echo $this->Form->control('products._ids', ['options' => $products, 'label' => '', 'class' => 'd-flex flex']); ?>
                    <br />
                </fieldset>
                <div class="col">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success'] ) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Html->link(__('Go Back to All Menus'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $menu->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger']
                    ) ?>
                </div>
                <br />
            </div>
        </div>
    </div>
<?php endif; ?>
