
<?php
$status = $this->Common->getstatus();
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>
        <!-- Basic Validation -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= $this->Flash->render() ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            <?= __('Edit SubCategories') ?>
                        </h2>
<?= $this->Common->getBreadcrumbAdminTwoLevel('SubCategories', 'index', 'SubCategories', __('Edit SubCategories')); ?>
                    </div>
                    <div class="body">
                        <!--                            <form id="form_validation" method="POST">-->
                        <?php //echo $this->element('Usermgmt.ajax_validation', ['formId'=>'addUserForm', 'submitButtonId'=>'addUserSubmitBtn']);  ?>
                        <?= $this->Form->create($subcategries, ['id' => 'addexercise', 'templates' => ['inputContainer' => '{{content}}']]) ?>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->control('category_id', ['class' => 'form-control', 'type' => 'select','empty'=>__('Select Category'),'options' => $categories]) ?> 
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'label' => false]) ?> 
                                <label class="form-label">SubCategory Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->control('description', ['class' => 'form-control', 'type' => 'text', 'label' => false]) ?> 
                                <label class="form-label">Description</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->input('status', ['empty' => __('Select status'), 'options' => $status, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <?= $this->Form->button('Edit SubCategories', ['class' => 'btn btn-primary waves-effect']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>