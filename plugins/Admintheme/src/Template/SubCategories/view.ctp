
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
                         <?= $this->Common->getBreadcrumbAdminTwoLevel('SubCategories', 'index', 'SubCategories', __('View SubCategories')); ?>
                        </div>
                        <div class="body">
                            
                             <div class="text-right" style="margin-bottom: 15px;">
                                            <a href="<?= $this->Url->build([ 'controller' => 'SubCategories','action' => 'edit', $subcategries['id']]);?>" class="btn btn-primary waves-effect">
                                                Edit
                                            </a>
                                           
                                            <a href="<?= $this->Url->build([ 'controller' => 'SubCategories','action' => 'delete', $subcategries['id']]);?>" class="btn btn-primary waves-effect" style="margin-left: 15px;">
                                                Delete
                                            </a>
                                        </div>
                        
                            <div class="contacts view large-9 medium-8 columns content">
                            
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('Body Name') ?></th>
                                    <td><?= $subcategries->category->name  ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Name') ?></th>
                                    <td><?= $subcategries->name  ?></td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"><?= __('Description') ?></th>
                                    <td><?= $subcategries->description ?></td>
                                </tr>
                               
                                <tr>
                                    <th scope="row"><?= __('Status') ?></th>
                                    <td><?= ($subcategries->status)? 'Active' : 'Inactive' ?></td>
                                </tr>
                                
                                
                                <tr>
                                    <th scope="row"><?= __('Created Date') ?></th>
                                    <td><?= $subcategries->created ?></td>
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

