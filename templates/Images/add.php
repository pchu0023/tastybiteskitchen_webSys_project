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
        <?php $this->layout = 'admin_default'; ?>

        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="card-title mb-0"><?= __('Add Image') ?></h4>
    <?= $this->Html->link(__('List Images'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="card-body">
                <?= $this->Form->create($image, ['type' => 'file', 'class' => 'form']) ?>
                    <div class="form-group">
                        <?= $this->Form->control('file', [
                            'type' => 'file', 
                            'label' => ['text' => 'Choose Image: (JPG, JPEG, PNG, GIF) ', 'class' => 'form-label'], 
                            'class' => 'form-control', 
                            'id' => 'image-upload', 
                            'onchange' => 'previewImage();',
                            'accept' => '.jpg, .jpeg, .png, .gif',
                            ]); ?>
                        <img id="image-preview" src="#" alt="Image Preview" style="display: none; width: 700px; height: 700px; object-fit: contain;"/>
                   </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-2']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function previewImage() {
    var file = document.getElementById('image-upload').files;
    if (file.length > 0) {
        var fileReader = new FileReader();

        fileReader.onload = function (event) {
            document.getElementById('image-preview').setAttribute('src', event.target.result);
            document.getElementById('image-preview').style.display = 'block';
        };

        fileReader.readAsDataURL(file[0]);
    }
}
</script>
