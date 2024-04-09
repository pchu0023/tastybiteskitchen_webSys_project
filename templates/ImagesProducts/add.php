<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagesProduct $imagesProduct
 * @var \Cake\Collection\CollectionInterface|string[] $images
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Images Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="imagesProducts form content">
            <?= $this->Form->create($imagesProduct) ?>
            <fieldset>
                <legend><?= __('Add Images Product') ?></legend>
                <?php
                    echo $this->Form->control('image_id', ['options' => $images]);
                    echo $this->Form->control('product_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
