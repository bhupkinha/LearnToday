
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
                            <?= __('Add Programs') ?>
                        </h2>
 <?= $this->Common->getBreadcrumbAdminTwoLevel('Programs', 'index', 'Programs', __('Edit Programs')); ?>
                    </div>
                    <div class="body">
                        <!--                            <form id="form_validation" method="POST">-->
                        <?php //echo $this->element('Usermgmt.ajax_validation', ['formId'=>'addUserForm', 'submitButtonId'=>'addUserSubmitBtn']);  ?>
                        <?= $this->Form->create($program, ['id' => 'addexercise', 'templates' => ['inputContainer' => '{{content}}']]) ?>

                        <div class="form-group form-float">
                            <div class="select-m">
                                          <?= $this->Form->control('category_id', ['class' => 'form-control select2', 'style' => 'width:100%;', 'type' => 'select', 'options' => $categories, 'label' => 'Category','onchange'=>'getSubCategory(this.id)', 'empty' => 'Choose Category']) ?>          
                                        </div>
                            
                        </div>
                        <div class="form-group form-float">
                            
                                        <div class="select-m" id="get_sub_category">
                                           <?= $this->Form->control('city_id', ['name' => 'city_id','class' => 'form-control select2','style' => 'width:100%;', 'type' => 'select', 'options' => [], 'label' => 'Location', 'empty' => 'Choose City']) ?> 
                                        </div>
                        </div>
                         <div class="form-group">
                                    <div class="form-line">
                                        <?= $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'label' => false, 'placeholder' => '', 'required' => TRUE]) ?>          
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line mutli-lang">
                                        <?= $this->Form->control('description', ['class' => 'form-control ckeditor', 'type' => 'textarea', 'label' => false, 'placeholder' => '', 'required' => TRUE]) ?>                                                  
                                    </div>
                                </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <?= $this->Form->input('status', ['empty' => __('Select status'), 'options' => $status, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <?= $this->Form->button('Add Programs', ['class' => 'btn btn-primary waves-effect']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



<script type="text/javascript">


$(document).ready(function () {
        $('#select2').select2();
    });
    function getSubCategory(clicked_id)
    {
        var category_id = $('#category-id').val();
        //alert(category_id);
        var urls = '<?= $this->Url->build(['controller' =>'Programs', 'action' =>'getSubcategory'])?>';
        //alert(urls);
        var data = '&category_id=' + escape(category_id);
        $.ajax({
            type: "POST",
            cache: false,
            data: data,
            url: urls,
            success: function (html)
            {
                $('#get_sub_category').html(html);
            }
        });
        return false;
    }

</script>