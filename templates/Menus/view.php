<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
<?php if ($this->Identity->get('type') === "emp") : ?>
    <?php $this->layout = 'admin_default'; ?>

    <div class="row">
        <div class="column column-80">
            <div class="menus view content">
                <h3><?= h($menu->name) ?></h3>
                <table>
                    <tr>
                        <small class="fst-italic"><?= h($menu->description) ?></small>
                        <br />
                    </tr>
                </table>
                <br />
                <aside class="column">
                    <div class="side-nav">
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span><?= __('Administrative Actions') ?></span>
                        </h6>
                        <?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Go Back to All Menus'), ['action' => 'admin_index'], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger']) ?>
                    </div>
                </aside>
            <?php else : ?>

                <div class="container-xxl py-5 bg-dark hero-header mb-5 ">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown " >Menu Item</h1>
                    </div>
                </div>

            <?php endif; ?>
            <br />

            <div class="products index content">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal"><?= h($menu->name) ?> </h5>
                    <br>

                    <h1 class="mb-5"><?= h($menu->description) ?> </h1>

                </div>
            </div>
            <?php if (!empty($menu->products)) : ?>
                <div class="row">

                    <?php foreach ($menu->products as $product) : ?>

                        <div class="col-lg-6 mb-4">
                            <div class="d-flex align-items-center">
                                <!-- Use Uncomment the following to distribute image on product-->
                                <!-- <img class="flex-shrink-0 img-fluid rounded" src=" $this->Html->image($product->images[0]->file_direction, ['alt' => $product->name, 'style' => 'width: 80px;']) ?>" /> -->
                                <?php if (!empty($product->images)) : ?>
                                    <!-- If there are more than one, make it a carousel -->
                                    <?php if (sizeof($product->images) > 1) : ?>
                                        <div id="carouselWithIndicators" class="carousel slide">
                                            <div class="carousel-inner">
                                                <?php foreach ($product->images as $image) : ?>
                                                    <div class="carousel-item active">
                                                        <img class="flex-shrink-0 img-fluid rounded" src="<?= $image->file_location ?>" alt="">
                                                        <!-- <img class="d-block w-100" src="<?= $image->file_location ?>" alt=""> -->
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
                                            <img class="flex-shrink-0 img-fluid rounded" src="<?= $image->file_location ?>" alt="" style="width: 80px;">

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <!-- Use Html->link to make only the product name a link -->
                                        <?= $this->Html->link(__($product->name), ['controller' => 'Products', 'action' => 'view', $product->id], ['style' => 'color: black;']) ?>

                                        <span class="text-primary">$<?= $this->Number->format($product->price) ?></span>
                                    </h5>
                                    <h6>Quantity: <?= h($product->quantity) ?></h6>
                                    <small class="fst-italic"><?= h($product->description) ?></small>

                                    <br>

                                    <div class="d-flex justify-content-end">
                                        <?= $this->Form->postButton('Add to cart', ['controller' => 'Products', 'action' => 'addToCart', $product->id], ['class' => 'btn btn-primary me-2']) ?>

                                        <?= $this->Html->link(__('View Details'), ['controller' => 'Products', 'action' => 'view', $product->id], ['class' => 'btn btn-secondary', 'style' => 'color: white; background-color: grey; margin-left: 5px;', 'escape' => false]) ?>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    </div>