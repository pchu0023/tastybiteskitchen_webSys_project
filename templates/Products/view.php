<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <?php if($this->Identity->get('type') === "emp") : ?>
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
                <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
    <?php endif; ?>

    <div class="d-flex align-items-center">
        <?php if (!empty($product->images)) : ?>
            <?php foreach ($product->images as $image) : ?>
                <img class="flex-sm-shrink-0 img-fluid rounded" src="<?= $image->file_location ?>" alt="">
                <?php if($this->Identity->get('type') === "emp") : ?>
                    <p>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $image->id]) ?>
                    </p>
                    <p>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?>
                    </p>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="w-100 d-flex flex-column text-start ps-4">
            <h5 class="d-flex justify-content-between border-bottom pb-2">
                <span><?= h($product->name) ?></span>
                <span class="text-primary"><?= $this->Number->format($product->price) ?></span>
            </h5>
            <small class="fst-italic"><?= h($product->description) ?></small>
            <br />
            <h6 class="d-flex justify-content-between border-bottom pb-1">
                <span>Ingredients</span>
            </h6>
            <?php if (!empty($product->ingredients)) : ?>
                <?php foreach ($product->ingredients as $ingredient) : ?>
                    <small class="fst-normal"><?= h($ingredient->name) ?></small>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
