<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IngredientsProduct $ingredientsProduct
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $ingredients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ingredientsProduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ingredientsProduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ingredients Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="ingredientsProducts form content">
            <?= $this->Form->create($ingredientsProduct) ?>
            <fieldset>
                <legend><?= __('Edit Ingredients Product') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('ingredient_id', ['options' => $ingredients]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
