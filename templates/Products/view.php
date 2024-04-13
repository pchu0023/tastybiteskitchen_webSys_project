<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <?php if($this->Identity->get('type') === "emp") : ?>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= h($product->id) ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($product->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($product->price) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Images') ?></h4>
                <?php if (!empty($product->images)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('File Location') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->images as $image) : ?>
                        <tr>
                            <div class="col-lg-2 text-right overflow-hidden">
                                <img class="img-fluid float-right" src="<?= $image->file_location ?>" alt="">
                            </div>
                            <td><?= h($image->id) ?></td>
                            <td><?= h($image->file_location) ?></td>
                            <?php if($this->Identity->get('type') === "emp") : ?>
                                <td class="actions">
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $image->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Ingredients') ?></h4>
                <?php if (!empty($product->ingredients)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->ingredients as $ingredient) : ?>
                        <tr>
                            <td><?= h($ingredient->id) ?></td>
                            <td><?= h($ingredient->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Ingredients', 'action' => 'view', $ingredient->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Ingredients', 'action' => 'edit', $ingredient->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ingredients', 'action' => 'delete', $ingredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <?php if($this->Identity->get('type') === "emp") : ?>
                <div class="related">
                    <h4><?= __('Related Menus') ?></h4>
                    <?php if (!empty($product->menus)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Name') ?></th>
                                    <th><?= __('Description') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($product->menus as $menu) : ?>
                                    <tr>
                                        <td><?= h($menu->id) ?></td>
                                        <td><?= h($menu->name) ?></td>
                                        <td><?= h($menu->description) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Menus', 'action' => 'view', $menu->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Menus', 'action' => 'edit', $menu->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Menus', 'action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="related">
                    <h4><?= __('Related Orders') ?></h4>
                    <?php if (!empty($product->orders)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Payment Id') ?></th>
                                    <th><?= __('Delivery Id') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($product->orders as $order) : ?>
                                    <tr>
                                        <td><?= h($order->id) ?></td>
                                        <td><?= h($order->payment_id) ?></td>
                                        <td><?= h($order->delivery_id) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $order->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $order->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
