<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WebsiteContent $websiteContent
 */
?>
    <?php if ($this->Identity->get('type') != "emp") : ?>
        <div class="alert alert-danger">You do not have privileges to view this page.</div>
        <?php else : ?>
    <?php $this->layout = 'admin_default'; ?>
            <legend><?= __('Edit website About Us Page') ?></legend>
    <div class="col">
        <div class="products form content">
        <?= $this->Form->create($websiteContent) ?>
            <fieldset>

                <?= $this->Html->link(__('Go Back to View Website Display'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>

                <?= $this->Html->link(__('Edit Images'), ['action' => '../Images/index'], ['class' => 'btn btn-primary']) ?>

                <!-- <br>
                <br>
                <h4 class="d-flex justify-content-between border-bottom pb-1">
                            <span>Edit website About Us Page</span>
                        </h4> -->
                <br><br>
                <h6 class="d-flex border-bottom">
                    <span>About Us Title</span>
                </h6>
                <?php echo $this->Form->control('about_title', [
                    'class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'About Us Title'
                ]); ?>

                    
                <h6 class="d-flex justify-content-between border-bottom pb-1">
                    <span>About Description</span>
                </h6>
                <?php echo $this->Form->control('about_description', [
                    'class' => 'form-control',
                    'label' => false,
                    'placeholder' => 'About Description',
                    'rows' => 5
                ]); ?>
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
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>About page Image One</span>
                                        </h6>
                                        <div class="row">
                                            <?php echo $this->Form->control('image1', ['options' => $globalImages, 'label' => false, 'class' => 'd-flex flex form-select', 'empty' => 'None']); ?>
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
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>About page Image Two</span>
                                        </h6>
                                        <div class="row">
                                            <?php echo $this->Form->control('image2', ['options' => $globalImages, 'label' => false, 'class' => 'd-flex flex form-select', 'empty' => 'None']); ?>
                                        </div>
                                        <br />
                                   
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

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
                                            <span>About page Image Three</span>
                                        </h6>
                                        <div class="row">
                                            <?php echo $this->Form->control('image3', ['options' => $globalImages, 'label' => false, 'class' => 'd-flex flex form-select', 'empty' => 'None']); ?>
                                        </div>
                                        <br />
                                      
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
                                    <td>
                                        <h6 class="d-flex justify-content-between border-bottom pb-1">
                                            <span>About page Image Four</span>
                                        </h6>
                                        <div class="row">
                                            <?php echo $this->Form->control('image4', ['options' => $globalImages, 'label' => false, 'class' => 'd-flex flex form-select', 'empty' => 'None']); ?>
                                        </div>
                                        <br />
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>
                <div class="row">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                </div>
                </fieldset>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        const phoneInput = document.getElementById('phone');
        
        phoneInput.addEventListener('input', function(e) {
            var value = e.target.value;
            var formatted = value.replace(/[^\d\s]/g, '') 
                                 .replace(/\s+/g, ' ') 
                                 .trim() 
                                 .substring(0, 12); 


            if (formatted.length === 2 || formatted.length === 7) {
                formatted += ' ';
            }
            
            phoneInput.value = formatted;
        });
    });
</script>

<?php endif; ?>

<!-- <?php
                    echo $this->Form->control('home_image');
                    echo $this->Form->control('address');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('email');
                    echo $this->Form->control('opening_time_weekdays');
                    echo $this->Form->control('opening_time_weekends');
                    echo $this->Form->control('logo_image');
                    echo $this->Form->control('about_title');
                    echo $this->Form->control('about_description');
                    echo $this->Form->control('image1');
                    echo $this->Form->control('image2');
                    echo $this->Form->control('image3');
                    echo $this->Form->control('image4');
                    
                ?> -->