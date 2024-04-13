<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $images
 * @var string[]|\Cake\Collection\CollectionInterface $ingredients
 * @var string[]|\Cake\Collection\CollectionInterface $menus
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="row">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="products form content">
                    <?= $this->Form->create($product) ?>
                    <fieldset>
                        <legend><?= __('Edit Product') ?></legend>
                        <h6 class="d-flex border-bottom">
                            <span>Name</span>
                        </h6>
                        <?php echo $this->Form->control('name', ['label' => '', 'class' => 'd-flex flex-column']); ?>
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Price</span>
                        </h6>
                        <?php echo $this->Form->control('price', ['label' => '', 'class' => 'd-flex']); ?>
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Description</span>
                        </h6>
                        <?php echo $this->Form->control('description', ['label' => '', 'class' => 'd-flex']); ?>
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Images</span>
                        </h6>
                        <?php echo $this->Form->control('images._ids', ['options' => $images, 'label' => '', 'class' => 'd-flex']); ?>
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Ingredients</span>
                        </h6>
                        <?php echo $this->Form->control('ingredients._ids', ['options' => $ingredients, 'label' => '', 'class' => 'd-flex']); ?>
                        <br />
                    </fieldset>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success'] ) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="d-flex align-items-center">
                        <!-- If there are images, display them -->
                        <?php if (!empty($product->images)) : ?>
                            <div class="carousel-inner">
                                <?php foreach ($product->images as $image) : ?>
                                    <img class="img-fluid" src="<?= $image->file_location ?>" alt="">
                                <?php endforeach; ?>
                            </div>
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
                                <br />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-danger py-sm-3 px-sm-5 me-2']
            ) ?>
            <?= $this->Html->link(__('Go Back to All Products'), ['action' => 'index'], ['class' => 'btn btn-primary py-sm-3 px-sm-5 me-2']) ?>
        </div>
        <br />
    </aside>
</div>
