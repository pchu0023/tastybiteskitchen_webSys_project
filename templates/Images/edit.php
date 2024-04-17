<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<?php if($this->Identity->get('type') != "emp") : ?>
    <div class="alert alert-danger">You do not have privileges to view this page.</div>
<?php else : ?>
    <div class="alert alert-danger">Please create a new image instead.</div>
<?php endif; ?>
