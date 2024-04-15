<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>
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
            <?php if ($this->Identity->get('type') === "emp") : ?>
                <br />
                <aside class="column">
                    <div class="side-nav">
                        <h4 class="heading"><?= __('Administrative Actions') ?></h4>
                        <?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Go Back to All Menus'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id), 'class' => 'btn btn-danger']) ?>
                    </div>
                </aside>
            <?php endif; ?>
            <br />
            <div class="related">
                <h4><?= __('Products') ?></h4>
                <br />
                <?php if (!empty($menu->products)) : ?>
                    <div class="row">

                    <?php foreach ($menu->products as $product) : ?>

                        <div class="col-lg-6 mb-4">
                            <div class="d-flex align-items-center">
                                <!-- <img class="flex-shrink-0 img-fluid rounded" src="<?= $this->Html->image('menu-' . $product->id . '.jpg', ['alt' => $product->name, 'style' => 'width: 80px;']) ?>" /> -->
                                <img class="flex-shrink-0 img-fluid rounded" src="img/about-1.jpg" alt="" style="width: 80px;">

                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">

                                        <!-- Use Html->link to make only the product name a link -->
                                        <?= $this->Html->link(
                                            h($product->name), // Product name as link text
                                            ['action' => 'view', $product->id], // Link target (view action with product ID)
                                            ['escape' => false] // Allow HTML content within link
                                        ) ?>

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