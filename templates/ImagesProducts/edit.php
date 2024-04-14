<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImagesProduct $imagesProduct
 * @var string[]|\Cake\Collection\CollectionInterface $images
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $imagesProduct->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $imagesProduct->id), 'class' => 'side-nav-item']
                ) ?>
                <?= $this->Html->link(__('List Images Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="imagesProducts form content">
                <?= $this->Form->create($imagesProduct) ?>
                <fieldset>
                    <legend><?= __('Edit Images Product') ?></legend>
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
<?php endif; ?>
