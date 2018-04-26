<?php
$lan = $cookie_value['lan'];
$nofrec = $this->Common->getNoOfRec();
$statu = $this->Common->getstatus();
$category_typ = $this->Common->getCategorytype();
?>
    <section class="content">
        <div class="container-fluid">  

         
         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= $this->Flash->render() ?> 
                    <div class="fixed-action-btn"><a href="<?= $this->Url->build(['controller' => 'Categories', 'action' => 'add']); ?>" class="btn btn-primary waves-effect btn-floating waves-light btn-large red"><i class="material-icons">add</i></a></div>
                
                    
                    <div class="card">
                        <div class="header">
                          <h2>  <?= __('Category') ?>
                            </h2>
                        </div>
                        
                          
                       
                        <div class="body">
                            <div class="box-body">
                        <?= $this->Form->create(NULL, ['type' => 'get', 'url' => ['controller' => 'Categories', 'action' => 'index']]) ?>
                        <div class="col-md-3">
                            <?php echo $this->Form->input('name', ['label' => __('Category Name'), 'class' => 'form-control', 'type' => 'text', 'placeholder' => __('Enter Category Name'), 'value' => $name]); ?>
                        </div>  
                        <div class="col-md-2">
                            <?= $this->Form->input('norec', ['label' => __('No. of Records'), 'type' => 'select', 'class' => 'form-control select2', 'placeholder' => __('select record'),'options' => $nofrec, 'value'=>$norec]); ?>
                        </div>
                                  <div class="col-md-2">
                            <?php echo $this->Form->input('status', ['label' => __('Status'), 'class' => 'form-control select2', 'empty' => __('Select Status'), 'options' => $statu, 'value' => $status]); ?>
                        </div>
                        <div class="col-md-3 marginTop25">
                            <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary']) ?>
                           
                            <?= $this->Html->link(__('Clear'), ['controller' => 'Categories'], ['class' => 'btn btn-danger']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div> 
                            <?php if ($this->Paginator->counter(['format' => __('{{count}}')]) != 0) { ?>
                            <table class="table table-bordered table-striped table-hover dataTable responsive">
                                <thead>
                                    <tr>
                                        <th><?= __('Name') ?></th>
                                        <th><?= __('Position') ?></th>
                                        <th><?= __('status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Action') ?></th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                     <th><?= __('Name') ?></th>
                                        <th><?= __('Position') ?></th>
                                        <th><?= __('status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Action') ?></th>
                                        
                                    </tr>
                                </tfoot>
                                <tbody>
                                     <?php foreach ($categories as $categories): ?>
                                    <tr>
                                        <td><?= $categories->name?></td>
                                       
                                        <!--<td><?= $this->common->turnCatefun($categories->slug,20) ?></td>-->
                                        
                            <td><?= $this->Form->control('position', ['type' => 'text', 'value'=>$categories->position, 'id'=>'position'.$categories->id, 'pattern'=>'\d+', 'onchange'=>'positonUpdate('.$categories->id.')', 'class' => 'form-control', 'label' => false]) ?></td>
                                           
                                      <td id='status<?= $categories->id ?>'>
                                            <?php
                                            if(isset($categories->status)  && $categories->status == '1'){
                                            ?>

  <?= $this->Form->button('Active',['class'=>'btn btn-success waves-effect','id'=>$categories->id,'value'=>$categories->status,'onclick'=>'updateStatus(this.id,'.$categories->status.')' ]) ?>
                                            <?php
                                            } else {
                                                ?>
   <?= $this->Form->button('Inactive',['class'=>'btn btn-primary waves-effect','id'=>$categories->id,'value'=>$categories->status,'onclick'=>'updateStatus(this.id,'.$categories->status.')' ]) ?>
                                                <?php
                                            }
                                            ?>
                                          
                                          
                                          
                                            </td>
                                            <td><?= $categories->created ?></td>
                                        <td>
                                 <i class="material-icons" title="<?= __('view') ?>"><?= $this->Html->link(__('visibility'), ['action' => 'view', $categories->id]) ?></i> 
                   <i class="material-icons" title="<?= __('Edit') ?>"><?= $this->Html->link(__('mode_edit'), ['action' => 'edit', $categories->id]) ?></i> 
                   <i class="material-icons" title="<?= __('Delete') ?>"><?= $this->Form->postLink(__('delete'), ['action' => 'delete', $categories->id], ['confirm' => __('Are you sure you want to delete Category ?', $categories->id)]) ?></i>
                    
                    
                                            
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                            <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>                             <?php } else { ?>
                            <div>&nbsp;</div>
                        <div class="text-center">
                            <div class="text-center noDataFound">
                                <strong><?= __('Record') ?></strong> <?= __('not found') ?>
                            </div>
                        </div>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            
          
        </div>
    </section>
    
    <script type="text/javascript">
        
        function updateStatus(clicked_id,status)
        {
            
            var id = clicked_id;
              
                var status = status;
                
           var urls = '<?= $this->Url->build(['controller' =>'Categories', 'action' =>'statusUpdate'])?>';
   
           var data = '&id=' + escape(id)+ '&status=' + escape(status);
           
         if(confirm("Are you sure to update status"))
         {
            $.ajax({
                 
        type: "POST",
        
        cache:false,
       
        data: data,
        
        url: urls,
        
        success: function(html)
			{
                            
				
                     $('#status'+id+'').html(html); // here we pass danamic id and fill color
             
			} 
    });
    return false;  
         }
         else
         {
             return false;
         }
            
        }
        
           function positonUpdate(id)
        {
            
            //alert("hello data");
            var category_id=id;
             //alert(category_id);error_show

             var position =  $('#position'+category_id+'').val();
            // alert(position);
             
             if (isNaN(position)) 
                 {
    alert("Please insert input numbers");
    return false;
                     }
             
            
           var urls = '<?= $this->Url->build(['controller' =>'Categories', 'action' =>'positionUpdate'])?>';
        // alert(urls);
           var data = '&category_id=' + escape(category_id)+ '&position=' + escape(position);
          // alert(data);
         if(confirm("Are you sure to update position ?"))
         {
            $.ajax({
                 
        type: "POST",
        
        cache:false,
       
        data: data,
        
        url: urls,
        
        success: function(data)
			{
                           // alert(data);
                            
                            if(data == 1)
                            {
                              
                                 window.location = '<?= $this->Url->build(['controller' =>'Categories', 'action' =>'index'])?>'; 
                            }
                            else
                            {
                                alert("Category position allready exist"); 
                      window.location = '<?= $this->Url->build(['controller' =>'Categories', 'action' =>'index'])?>'; 
                            }
                            
				
                     
             
			} 
    });
    return false;  
         }
         else
         {
             return false;
         }
            
        }     
        
        
        </script>


