<!-- File: src/Template/Products/admin_multi_edit_quantity.php -->

<?= $this->Form->create(null, ['url' => ['controller' => 'Products', 'action' => 'updateAllQuantities']]) ?>
<div class="products index content">
    <!-- Display for admin -->
    <?php $this->layout = 'admin_default'; ?>
    <br />
    <?= $this->Html->link(__('Back To All Products'), ['action' => 'index'], ['class' => 'btn btn-primary float-right']) ?>
    <br />
    <br />
    <h4>* Enter new quantity for each product and submit to update *</h4>
    <br />

    <h3 class="d-flex justify-content-between border-bottom pb-1"><?= __('Products') ?></h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= __('Quantity') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $product) : ?>
                    <tr>
                        <td style="max-width:100px; word-wrap:break-word;"><?= h($product->name) ?></td>
                        <td style="max-width: 300px; word-wrap: break-word;"><?= h($product->description) ?></td>
                        <td><?= $this->Form->input(
                                "quantity.{$product->id}",
                                [
                                    'type' => 'number',
                                    'value' => $product->quantity,
                                    'min' => '0',     // Ensures the price is not negative, doubled in validator
                                    'max' => '9999', // Ensures the price is not over 100%, doubled in validator
                                    'class' => 'form-control',
                                    'size' => 3,
                                    'style' => 'width: 100px;' // Adjust the width directly with inline CSS
                                ]
                            ) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br />

    <div class="d-grid">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    </div>
    <br />
    <br />
</div>
<?= $this->Form->end() ?>