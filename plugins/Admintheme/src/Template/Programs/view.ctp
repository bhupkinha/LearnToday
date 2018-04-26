
<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="pull-left">
                               <?= __('View Subcategory') ?>
                            </h2>
                            <?= $this->Common->getBreadcrumbAdminTwoLevel('Programs', 'index', 'Programs', __('View Programs')); ?>
                        </div>
                        <div class="body">
                            
                             <div class="text-right" style="margin-bottom: 15px;">
                                            <a href="<?= $this->Url->build([ 'controller' => 'Programs','action' => 'edit', $program['id']]);?>" class="btn btn-primary waves-effect">
                                                Edit
                                            </a>
                                           
                                            <a href="<?= $this->Url->build([ 'controller' => 'Programs','action' => 'delete', $program['id']]);?>" class="btn btn-primary waves-effect" style="margin-left: 15px;">
                                                Delete
                                            </a>
                                        </div>
                        
                            <div class="contacts view large-9 medium-8 columns content">
                            
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Category Name') ?></th>
                                    <td><?= $program->category->name  ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('SubCategory Name') ?></th>
                                    <td><?= $program->sub_category->name  ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= $program->name  ?></td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><?= __('Description') ?></th>
                                    <td><?= $program->description ?></td>
                                </tr>
                               
                                <tr>
                                    <th scope="row"><?= __('Status') ?></th>
                                    <td><?= ($program->status)? 'Active' : 'Inactive' ?></td>
                                </tr>
                                
                                
                                <tr>
                                    <th scope="row"><?= __('Created Date') ?></th>
                                    <td><?= $program->created ?></td>
                                </tr>
                                
                            </table>
                           
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
</section>

