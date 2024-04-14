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
            <?php if($this->Identity->get('type') === "emp") : ?>
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
                <?php if (!empty($menu->products)) : ?>
                <div class="table-responsive">
                    <table>
                        <?php foreach ($menu->products as $product) : ?>
<!--                        <tr>-->
<!--                            --><?php //if (!empty($product->images)) : ?>
<!--                                --><?php //foreach ($product->images as $image) : ?>
<!--                                    <td>-->
<!--                                        <div class="carousel-item active">-->
<!--                                            <img class="d-block w-100" src="--><?php //= $image->file_location ?><!--" alt="">-->
<!--                                        </div>-->
<!--                                    </td>-->
<!--                                --><?php //endforeach; ?>
<!--                            --><?php //else : ?>
<!--                                <td>-->
<!--                                    <div class="carousel-item active">No image found.</div>-->
<!--                                </td>-->
<!--                            --><?php //endif; ?>
<!--                            <td>--><?php //= h($product->name) ?><!--</td>-->
<!--                            <td>--><?php //= h($product->price) ?><!--</td>-->
<!--                            <td>--><?php //= h($product->description) ?><!--</td>-->
<!--                            <td class="actions">-->
<!--                                --><?php //= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $product->id]) ?>
<!--                                --><?php //= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $product->id]) ?>
<!--                                --><?php //= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
<!--                            </td>-->
<!--                        </tr>-->
                        <div class="w-100 d-flex flex-column text-start ps-4">
                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                <span><?= h($product->name) ?></span>
                                <span class="text-primary"><?= $this->Number->format($product->price) ?></span>
                            </h5>
                            <small class="fst-italic"><?= h($product->description) ?></small>
                            <br />
                        </div>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
