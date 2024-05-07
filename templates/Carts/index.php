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
<?= $this->Html->script("https://js.stripe.com/v3/") ?>
<div class="carts index content">

        <!-- display for all users -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .9)), url('<?= htmlspecialchars($websiteContent->background_image) ?>'); background-position: center center; background-repeat: no-repeat; background-size: cover;">            <div class="container text-center my-5 pt-5 pb-4">
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
            <table class="table table-striped">
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


<h5>
                    <?php
                    $totalPrice = 0;
                    if (!empty($this->request->getSession()->read('cart'))) : ?>
                        <?php
                        $size = sizeof($this->request->getSession()->read('cart'));
                        echo  "Food item in cart: " . $size ?>

</h5>
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
                            <span class="text-primary" id="productID"><?= $this->Html->link(__($product->name), ['controller' => 'Products', 'action' => 'view', $product->id]) ?></span>
                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                          </small>
                        </div>
                      </div>
                    </td>

                    <td class="text-right font-weight-semibold align-middle p-4"><?= $product->price ?></td>
                    <td class="align-middle p-4"><input name="quantity[]" readonly type="number" min = 1 max = 10 step = 1 class="form-control text-center" value="<?= $quant ?>"
                        onchange="this.value = Math.round(this.value);"


                        /></td>
                    <td class="text-right font-weight-semibold align-middle p-4" id="totalProdPrice"><?= $product->price * $quant ?></td>
                      <td class="actions">
                          <?= $this->Html->link(__('Delete'), ['action' => 'delete', $product->id], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>

                      </td>

                  </tr>
                <?php endforeach; ?>

                        <tr>
                            <td class="p-4">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <a href="#" class="d-block text-dark"></a>
                                        <small>
                                            <span class="text-primary"> </span>
                                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <td class="text-right font-weight-semibold align-middle p-4"></td>

                            <td class="actions">
<!--                                --><?php //= $this->Form->postButton('Update', ['controller' => 'Carts', 'action' => 'update', $product->id, 3], ['class' => 'btn btn-secondary py-sm-2 px-sm-3 me-2']) ?>


                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4" id="totalProdPrice"></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Clear Cart'), ['action' => 'clear'], ['class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>

                            </td><!--                      <td class="text-center align-middle px-0"><button class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</button></td>-->

                        </tr>

<!--                        --><?php //echo $this->Form->end();?>

                <?php else : ?>

                  <label class="text-muted font-weight-normal m-0">Your Cart is empty, come back to this page after you have added some products.</label>

                <?php endif; ?>

                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->

            <div class="float-left">
                <div class="mt-4">
                <label class="text-muted font-weight-normal m-0"><h5>Total price:</h5>
                <h4> $<?= $totalPrice ?></h4></label>
                 <br>
                <label class="text-muted font-weight-normal m-0"> Once checkout, your order will be recorded. </label>
                <label class="text-muted font-weight-normal m-0">  To finish purchasing these products, please contact us using our contact details at the bottom of the website.</label>

                </div>
              </div>
            </div>

            <div class="float-left">
            <!--  Change this to redirect to the payment confirmation page when completed -->
                <?php if (!empty($this->request->getSession()->read('cart'))) : ?>
<!--                Create modal pop-up asking for delivery preferences -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                Save delivery preferences to session -->
<!--                Pay with Card button pointing to stripe -->
<!--                Pay with Bank transfer button -->
<!--                Redirect to confirmation page which: -->
<!--                    Creates order -->
<!--                    Creates delivery -->
<!--                    Creates payment -->
<!--                        If from Stripe, then paid -->
<!--                        Else, then set as not paid -->
<!--                    Links order and delivery -->
                    <?= $this->Html->link(__('Checkout'), ['action' => 'checkout'], ['class' => 'btn btn-lg btn-primary mt-2']) ?>
                <?php endif; ?>
                <a href="<?= $this->Url->build('/Menus') ?>" class="btn btn-lg btn-secondary mt-2">Return to Menus</a>

            </div>


          </div>
      </div>
  </div>





