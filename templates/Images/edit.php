<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
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
                    ['action' => 'delete', $image->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $image->id), 'class' => 'side-nav-item']
                ) ?>
                <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column column-80">
            <div class="images form content">
                <?= $this->Form->create($image) ?>
                <fieldset>
                    <legend><?= __('Edit Image') ?></legend>
                    <?php
                    echo $this->Form->control('file_location');
                    echo $this->Form->control('products._ids', ['options' => $products]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<?php endif; ?>
