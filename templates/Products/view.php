<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="users manage content">

    <div class="row">
        <div class="d-flex align-items-center">
            <!-- If there are images, display them -->
            <?php if (!empty($product->images)) : ?>
                <!-- If there are more than one, make it a carousel -->
                <?php if (sizeof($product->images) > 1) : ?>
                    <div id="carouselWithIndicators" class="carousel slide">
                        <div class="carousel-inner">
                            <?php foreach ($product->images as $image) : ?>
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="<?= $image->file_location ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselWithIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselWithIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Else just display the one image -->
                <?php else : ?>
                    <?php foreach ($product->images as $image) : ?>
                        <img class="flex-sm-shrink-0 img-fluid rounded" src="<?= $image->file_location ?>" alt="">
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
            <div class="w-100 d-flex flex-column text-start ps-4">
                <h4 class="d-flex justify-content-between border-bottom pb-2">
                    <span><?= h($product->name) ?></span>
                    <span class="text-primary">$<?= $this->Number->format($product->price) ?></span>
                    <?= $this->Form->postButton(
                        $product->quantity > 0 ? 'Add to cart' : 'Unavailable',
                        ['controller' => 'Products', 'action' => 'addToCart', $product->id],
                        [
                            'class' => 'btn btn-primary me-2',
                            'disabled' => $product->quantity == 0 ? true : false
                        ]
                    ) ?>
                </h4>
                <h6>Quantity: <?= h($product->quantity) ?></h6>

                <small class="fst-italic"><?= h($product->description) ?></small>
                <br />
                <h6 class="d-flex justify-content-between border-bottom pb-1">
                    <span>Extra Information</span>
                </h6>
                <?php if (!empty($product->extra_info)) : ?>
                    <small class="fst-normal"><?= h($product->extra_info) ?></small>

                    <!-- <?php foreach ($product->ingredients as $ingredient) : ?>
                    <small class="fst-normal"><?= h($ingredient->name) ?></small>
                <?php endforeach; ?> -->
                    <br />
                <?php endif; ?>
                <?php if ($this->Identity->get('type') === "emp") : ?>
                    <?php $this->layout = 'admin_default'; ?>

                    <aside class="column">
                        <div class="side-nav">
                            <h6 class="d-flex justify-content-between border-bottom pb-1">
                                <span><?= __('Administrative Actions') ?></span>
                            </h6>
                            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                        </div>
                    </aside>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>