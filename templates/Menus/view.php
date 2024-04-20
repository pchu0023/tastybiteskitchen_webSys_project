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
                        <h4 class="heading"><?= __('Administrative Actions') ?></h4>
                        <?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Go Back to All Menus'), ['action' => 'admin_index'], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger']) ?>
                    </div>
                </aside>
            <?php else : ?>

                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Menu Item</h1>
                    </div>
                </div>

            <?php endif; ?>
            <br />

            <div class="products index content">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal"><?= h($menu->name) ?> </h5>
                   <br>
                    <small  >------Please click each item name for item details and make multiple purchases------</small>

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

                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">

                                        <!-- Use Html->link to make only the product name a link -->
                                        <span><?= $this->Html->link(__($product->name), ['controller' => 'Products', 'action' => 'view', $product->id]) ?></span>
                                        <span class="text-primary">$<?= $this->Number->format($product->price) ?></span>
                                    </h5>
                                    <small class="fst-italic"><?= h($product->description) ?></small>
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