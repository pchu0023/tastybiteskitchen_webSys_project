<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $images
 * @var \Cake\Collection\CollectionInterface|string[] $ingredients
 * @var \Cake\Collection\CollectionInterface|string[] $menus
 * @var \Cake\Collection\CollectionInterface|string[] $orders
 */
?>
<?php if ($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <?php $this->layout = 'admin_default'; ?>

    <div class="col">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Add New Product') ?></legend>
                <?= $this->Html->link(__('Go Back to All Products'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>

                <br>
                <br>
                <h6 class="d-flex border-bottom">
                    <span>Name *</span>
                </h6>
                <?php echo $this->Form->control('name', [
                    'class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'Product Name'
                ]); ?>
                <div class="row">

                    <div class="col">
                        <br />
                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Price *</span>
                        </h6>
                        <?php echo $this->Form->control('price', [
                            'class' => 'form-control',
                            'label' => false,
                            'type' => 'number',
                            'step' => '0.01', // Allows entering cents
                            'min' => '0',    // Ensures the price is not negative
                            'default' => '0', // Sets initial value to 0
                            'placeholder' => 'Product Price'
                        ]); ?>
                    </div>
                    <div class="col">
                        <br />
                        <h6 class="d-flex border-bottom">
                            <span>Quantity* </span>
                        </h6>
                        <?php echo $this->Form->control('quantity', [
                            'class' => 'form-control',
                            'label' => false,
                            'type' => 'number',
                            'step' => '1', // Allows entering cents
                            'min' => '0',    // Ensures the price is not negative
                            'max' => '9999',    // Ensures the price is not negative
                            'default' => '999', // Sets initial value to 0
                            'placeholder' => 'Product Quantity'
                        ]); ?>
                    </div>
                </div>
                <br />
                <h6 class="d-flex justify-content-between border-bottom pb-1">
                    <span>Description *</span>
                </h6>
                <?php echo $this->Form->control('description', [
                    'class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'Product Description',
                    'rows' => 5
                ]); ?>
                <br />
                <h6 class="d-flex justify-content-between border-bottom pb-1">
                                <span>Extra Information </span>
                            </h6>
                            <?php echo $this->Form->control('extra_info', [
                                'class' => 'form-control',
                                'label' => false,
                                'placeholder' => 'Example: contain nuts and dairy',
                                'rows' => 5
                            ]); ?>

                            <br/>
                <!-- image edit and menu edit -->
                <div class="row">

                    <div class="col">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>Images</span>
                                        </h6>
                                        <div class="row">
                                            <?php echo $this->Form->control('images._ids', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table style="width: 90%; margin: 0 auto;">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>Menus</span>
                                        </h6>
                                        <?php echo $this->Form->control('menus._ids', ['options' => $menus, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                        <br />
                                        <div class="row">
                                            <?= $this->Html->link(__('Edit Menus'), ['action' => '../Menus/admin_index'], ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- <div class="row">
                    <table>
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                            <h6 class="d-flex border-bottom">
                                    <span>Images</span>
                                </h6>
                                <div class="row">
                                    <?php echo $this->Form->control('images._ids', ['options' => $images, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                </div>
                                <br />
                                <div class="row">
                                    <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <br />
                <div class="row">
                    <div class="col">
                        <table>
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <h6 class="d-flex justify-content-between border-bottom pb-1">
                                        <span>Ingredients</span>
                                    </h6>
                                    <?php echo $this->Form->control('ingredients._ids', ['options' => $ingredients, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                    <br />
                                    <div class="row">
                                        <?= $this->Html->link(__('Edit Ingredients'), ['action' => '../Ingredients/index'], ['class' => 'btn btn-primary']) ?>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table>
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <h6 class="d-flex justify-content-between border-bottom pb-1">
                                        <span>Menus</span>
                                    </h6>
                                    <?php echo $this->Form->control('menus._ids', ['options' => $menus, 'label' => false, 'class' => 'd-flex flex form-select']); ?>
                                    <br />
                                    <div class="row">
                                        <?= $this->Html->link(__('Edit Menus'), ['action' => '../Menus/index'], ['class' => 'btn btn-primary']) ?>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->

                <br />
                <br />
                <div class="row">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                </div>
                <br />

            </fieldset>

        </div>
    </div>
<?php endif; ?>