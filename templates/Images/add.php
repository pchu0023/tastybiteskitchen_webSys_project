<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
 <div class="row">
        <aside class="column">
        </aside>
        <div class="container mt-5">
    <?php if ($this->Identity->get('type') != "emp"): ?>
        <div class="alert alert-danger">You do not have privileges to view this page.</div>
    <?php else: ?>
        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0"><?= __('Add Image') ?></h4>
    <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="card-body">
                <?= $this->Form->create($image, ['type' => 'file', 'class' => 'form']) ?>
                    <div class="form-group">
                        <?= $this->Form->control('file', ['type' => 'file', 'label' => ['text' => 'Choose Image', 'class' => 'form-label'], 'class' => 'form-control']); ?>
                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-2']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    <?php endif; ?>
</div>
