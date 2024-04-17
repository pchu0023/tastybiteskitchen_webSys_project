<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="container-xxl bg-white p-0">
    <!-- Checkout Content Start -->
    <?php if($this->Identity->get('type') != "emp") : ?>
    <div class="container py-5">


       <!-- <h2 class="heading">

            <?php /*= $this->Html->link(__('Checkout')) */?>

        </h2>-->

        <?= $this->Form->create(null,['url'=>['controller' => 'Payments', 'action' => 'checkout'],
            'method' => 'POST']) ?>
        <div class="row">
            <div class="col-lg-8">

                    <div class="mb-3">

                        <?= $this->Form->control('name', [
                            'label' => ['class' => 'form-label', 'text' => 'Full Name'],
                            'class' => 'form-control form-control-lg',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="mb-3">


                        <?= $this->Form->control('phone', [
                            'label' => ['class' => 'form-label', 'text' => 'Phone Number','type'=>'tel'],
                            'class' => 'form-control form-control-lg',
                            'required' => true
                        ]) ?>
                    </div>
                    <div class="mb-3">

                        <?= $this->Form->control('email', [
                            'label' => ['class' => 'form-label', 'text' => 'Email Address','type'=>'email'],
                            'class' => 'form-control form-control-lg',
                            'required' => true
                        ]) ?>
                    </div>

                <div class="col active mb-3">
                    <div class="text-primary text-center">
                        <i class="la-3x las la-credit-card mb-2"></i>
                        <h3 class="fs-14 fw-600 d-none d-lg-block">Payment</h3>
                    </div>



                    <div class="col active mb-3">

                    <?= $this->Form->control('BankName', [
                        'label' => ['class' => 'form-label', 'text' => 'Bank Name','type'=>'text'],
                        'class' => 'form-control form-control-lg',
                        'required' => true
                    ]) ?>

                </div>
                    <div class="col active mb-3">

                    <?= $this->Form->control('BankName', [
                        'label' => ['class' => 'form-label', 'text' => 'Account Number','type'=>'text'],
                        'class' => 'form-control form-control-lg',
                        'required' => true
                    ]) ?>


                </div>
                </div>



                    <button type="submit" class="btn btn-primary">Place Order</button>

            </div>
            <div class="col-lg-4">
                <h4>Order Summary</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted"><?= $product->name ?></small>
                        </div>
                       <input type="hidden" name="amount" value="<?= $this->Number->format($product->price) ?>">
                        <span class="text-muted">$<?= $this->Number->format($product->price) ?></span>
                    </li>
                    <!-- Repeat for other products -->
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$<?= $this->Number->format($product->price) ?></strong>
                    </li>
                </ul>
            </div>
        </div>

        <?= $this->Form->end() ?>
    </div>
    <?php else : ?>
</div>
    <div class="row">
        <div class="d-flex align-items-center">
            <!-- If there are images, display them -->
            <?php if (!empty($product->images)) : ?>
                <!-- If there are more than one, make it a carousel -->
                <?php if (sizeof($product->images) > 1) : ?>
                    <div id="carouselWithIndicators" class="carousel slide">
                        <div class="carousel-inner">
                            <?php foreach ($product->images as $image) : ?>
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="<?= $image->file_location ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselWithIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselWithIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- Else just display the one image -->
                <?php else : ?>
                    <?php foreach ($product->images as $image) : ?>
                        <img class="flex-sm-shrink-0 img-fluid rounded" src="<?= $image->file_location ?>" alt="">
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
            <div class="w-100 d-flex flex-column text-start ps-4">
                <h5 class="d-flex justify-content-between border-bottom pb-2">
                    <span><?= h($product->name) ?></span>
                    <span class="text-primary"><?= $this->Number->format($product->price) ?></span>
                </h5>
                <small class="fst-italic"><?= h($product->description) ?></small>
                <br />
                <h6 class="d-flex justify-content-between border-bottom pb-1">
                    <span>Ingredients</span>
                </h6>
                <?php if (!empty($product->ingredients)) : ?>
                    <?php foreach ($product->ingredients as $ingredient) : ?>
                        <small class="fst-normal"><?= h($ingredient->name) ?></small>
                    <?php endforeach; ?>
                    <br />
                <?php endif; ?>
                <?php if($this->Identity->get('type') === "emp") : ?>
                    <aside class="column">
                        <div class="side-nav">
                            <h6 class="d-flex justify-content-between border-bottom pb-1">
                                <span><?= __('Administrative Actions') ?></span>
                            </h6>
                            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'btn btn-primary py-sm-2 px-sm-3 me-2']) ?>
                            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-danger py-sm-2 px-sm-2 me-2']) ?>
                        </div>
                    </aside>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Checkout Content End -->
    <?php endif; ?>


