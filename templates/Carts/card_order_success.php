<?php ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Thank you for your order!</h4>
                <p>Your order has been received and is being processed.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Don't refresh your page!</h4>
                <p>Please take note of your order ID before navigating away or refreshing, as you will not be able to access this again.</p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <h3>Order Summary</h3>
<br>
    <div class="row">
        <div class="col-12">
            <h5>Order Details</h5>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Order ID</th>
                    <td><?= h($order->id) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <h5>Items</h5>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->request->getSession()->read('cart') as $value) :
                    $product = $value['product'];
                    $quant = $value['quantity'];
                    ?>
                    <tr>
                        <td class="p-4">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <a href="#" class="d-block text-dark"></a>
                                    <small>
                                        <span class="text-primary" id="productID"><?= $this->Html->link(__($product->name), ['controller' => 'Products', 'action' => 'view', $product->id]) ?></span>
                                        <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                                    </small>
                                </div>
                            </div>
                        </td>
                        <?php if ($quant >= 20) : ?>
                            <td class="text-right font-weight-semibold align-middle p-4"><?= ($product->price) * (1.0 - ($product->catering_discount / 100)) ?></td>
                        <?php else : ?>
                            <td class="text-right font-weight-semibold align-middle p-4"><?= $product->price ?></td>
                        <?php endif ?>
                        <td class="align-middle p-4"><input name="quantity[]" readonly type="number" min = 1 max = 10 step = 1 class="form-control text-center" value="<?= $quant ?>"
                                                            onchange="this.value = Math.round(this.value);"
                            /></td>
                        <?php if ($quant >= 20) : ?>
                            <td class="text-right font-weight-semibold align-middle p-4" id="totalProdPrice"><?= ($product->price) * (1.0 - ($product->catering_discount / 100)) * $quant ?></td>
                        <?php else : ?>
                            <td class="text-right font-weight-semibold align-middle p-4" id="totalProdPrice"><?= $product->price * $quant ?></td>
                        <?php endif ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <h5>Delivery Details</h5>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">First Name</th>
                    <td><?= h($deliveryData['first_name']) ?></td>
                </tr>
                <tr>
                    <th scope="row">Last Name</th>
                    <td><?= h($deliveryData['last_name']) ?></td>
                </tr>
                <tr>
                    <th scope="row">Phone Number</th>
                    <td><?= h($deliveryData['phone_number']) ?></td>
                </tr>
                <tr>
                    <th scope="row">Email Address</th>
                    <td><?= h($deliveryData['email']) ?></td>
                </tr>
                <tr>
                    <th scope="row">Delivery Address</th>
                    <td><?= h($deliveryData['address']) ?></td>
                </tr>
                <tr>
                    <th scope="row">Requested Delivery Date</th>
                    <td><?= h($deliveryData['requested_date']) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <label class="text-muted font-weight-normal m-0"> <strong>Reminder:</strong> Once noting down orderID, feel free to refresh the page for leaving, or navigate to other pages from the top menu. </label>

    </div>
</div>
