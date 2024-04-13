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
                <h4 class="heading"><?= __('Administrative Actions') ?></h4>
                <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'btn btn-primary py-sm-3 px-sm-5 me-3']) ?>
                <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-danger py-sm-3 px-sm-5 me-3']) ?>
            </div>
        </aside>
    <?php endif; ?>

    <div class="d-flex align-items-center">
        <?php if (!empty($product->images)) : ?>
            <?php foreach ($product->images as $image) : ?>
                <img class="flex-sm-shrink-0 img-fluid rounded" src="<?= $image->file_location ?>" alt="">
                <?php if($this->Identity->get('type') === "emp") : ?>
                    <p>
                        <?= $this->Html->link(__('Edit Image'), ['controller' => 'Images', 'action' => 'edit', $image->id], ['class' => 'btn btn-primary py-sm-2 px-sm-5 me-1']) ?>
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
