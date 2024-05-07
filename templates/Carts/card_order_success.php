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
            <h5>Order Details</h5>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Order ID</th>
                    <td><?= h($deliveryData['first_name']) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <h5>Items</h5>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Item 1</th>
                    <td><?= h($deliveryData['first_name']) ?></td>
                </tr>
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
    </div>
</div>
