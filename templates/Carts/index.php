<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Carts> $Carts
 */

 /**
  *
    *            <?php echo $_SESSION["cart"][0] ?>;

  */
?>
<div class="carts index content">

        <!-- display for all users -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Shopping Cart</h1>
            </div>
        </div>

        <div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Your products</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
                    <!-- create a for each loop here to create one of these entries for each product in the session -->



                    <?php
                    $totalPrice = 0;
                    if (!empty($this->request->getSession()->read('cart'))) : ?>
                        <?php
                        $size = sizeof($this->request->getSession()->read('cart'));
                        echo  "products in cart:" . $size ?>


                    <?php
                    foreach ($this->request->getSession()->read('cart') as $value) :
                        $product = $value['product'];
                        $quant = $value['quantity'];
                        $totalPrice += ($product->price)*$quant;
                        ?>
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <!-- Place image here -->
<!--                             <img class="flex-shrink-0 img-fluid rounded" src="--><?php //= $this->Html->image('menu-' . $value->id . '.jpg', ['alt' => $value->name, 'style' => 'width: 80px;']) ?><!--" /> -->
<!--                             --><?php ////= $this->Html->image('about-1.jpg', ['alt' => '', 'style' => 'width: 80px;']) ?>
                        <div class="media-body">
                          <a href="#" class="d-block text-dark"></a>
                          <small>
                            <span class="text-primary"><?= $product->name?> </span>
                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                          </small>
                        </div>
                      </div>
                    </td>

                    <td class="text-right font-weight-semibold align-middle p-4"><?= $product->price ?></td>
                    <td class="align-middle p-4"><input type="number" min = 1 step = 1 class="form-control text-center" value="<?= $quant ?>"
                        oninput="this.value = Math.round(this.value);"

                        ></td>
                    <td class="text-right font-weight-semibold align-middle p-4" id="totalProdPrice"><?= $product->price * $quant ?></td>
                    <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>

                  </tr>
                <?php endforeach; ?>


                <?php else : ?>

                  <label class="text-muted font-weight-normal m-0">Your Cart is empty, come back to this page after you have added some products.</label>

                <?php endif; ?>

                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->

            <div class="float-left">
                <div class="mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong> $<?= $totalPrice ?></strong></div>
                <label class="text-muted font-weight-normal m-0">If you are interested in purchasing these products, please contact us using our contact details at the bottom of the website.</label>

                </div>
              </div>
            </div>

            <div class="float-left">
            <a href="<?= $this->Url->build('/Menus') ?>" class="btn btn-secondary">Return to Menus</a>
            <!--  Create a button link here to the payment page created by Shuhui
              <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>
                -->
            </div>


          </div>
      </div>
  </div>





