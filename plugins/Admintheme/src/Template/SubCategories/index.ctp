
<?php
$statu = $this->Common->getstatus();
$nofrec = $this->Common->getNoOfRec();
?>
<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="fixed-action-btn"><a href="<?= $this->Url->build(['controller' => 'SubCategories', 'action' => 'add']); ?>" class="btn btn-primary waves-effect btn-floating waves-light btn-large red"><i class="material-icons">add</i></a></div>
                <?= $this->Flash->render() ?>
                <div class="card">
                    <div class="header">
                        <h2 >
                            <?= __('SubCategories List') ?>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="box-body">
                            <?= $this->Form->create(NULL, ['type' => 'get', 'url' => ['controller' => 'SubCategories', 'action' => 'index']]) ?>
                            <div class="col-md-3">
                                <?php echo $this->Form->input('name', ['label' => __('Name'), 'class' => 'form-control', 'type' => 'text', 'placeholder' => __('SubCategories Name'), 'value' => $name]); ?>
                            </div>
                             <div class="col-md-2">
                                <?= $this->Form->input('body_id', ['label' => __('No. of Records'), 'type' => 'select', 'class' => 'form-control', 'placeholder' => __('select record'), 'options' => $categories, 'value' => $bodie]); ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->input('norec', ['label' => __('No. of Records'), 'type' => 'select', 'class' => 'form-control', 'placeholder' => __('select record'), 'options' => $nofrec, 'value' => $norec]); ?>
                            </div>
                            <div class="col-md-2">
                                <?php echo $this->Form->input('status', ['label' => __('Status'), 'class' => 'form-control', 'empty' => __('Select Status'), 'options' => $statu, 'value' => $status]); ?>
                            </div>
                            <div class="col-md-3 marginTop25">
                                <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary']) ?>
                                <?= $this->Html->link(__('Clear'), ['controller' => 'SubCategories'], ['class' => 'btn btn-danger']) ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div> 
                        <?php if ($this->Paginator->counter(['format' => __('{{count}}')]) != 0) { ?>
                            <table class="table table-bordered table-striped table-hover dataTable responsive" id="userstable">
                                <thead>
                                    <tr>
                                        <th><?=__('Category')?></th>
                                        <th><?= __('SubCategories Name') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Action') ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><?=__('Category')?></th>
                                        <th><?= __('SubCategory Name') ?></th>
                                        <th><?= __('Status') ?></th>
                                        <th><?= __('Created') ?></th>
                                        <th><?= __('Action') ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($subcategries as $subcategrie) {  ?>
                                        <tr>
                                            <td><?= ucfirst($subcategrie->category->name) ?></td>
                                            <td><?= ucfirst($subcategrie['name']) ?></td>
                                            <td id='status<?= $subcategrie->id ?>'>
                                                <?php
                                                if (isset($subcategrie->status) && $subcategrie->status == '1') {
                                                    ?>

                                                    <?= $this->Form->button('Active', ['class' => 'btn btn-success waves-effect', 'id' => $subcategrie->id, 'value' => $subcategrie->status, 'onclick' => 'updateStatus(this.id,' . $subcategrie->status . ')']) ?>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <?= $this->Form->button('Inactive', ['class' => 'btn btn-primary waves-effect', 'id' => $subcategrie->id, 'value' => $subcategrie->status, 'onclick' => 'updateStatus(this.id,' . $subcategrie->status . ')']) ?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?= $subcategrie['created'] ?></td>

                                            <td><i class="material-icons"><?= $this->Html->link(__('visibility'), ['action' => 'view', $subcategrie['id']]) ?></i>
                                                <i class="material-icons"><?= $this->Html->link(__('mode_edit'), ['action' => 'edit', $subcategrie['id']]) ?></i>
                                                <i class="material-icons" title="<?= __('Delete') ?>"><?= $this->Form->postLink(__('delete'), ['action' => 'delete', $subcategrie['id']], ['confirm' => __('Are you sure you want to delete subcategrie ?', $subcategrie['id'])]) ?></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
                            </div>
                        <?php } else { ?>
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
        <!-- #END# Basic Examples -->
    </div>
</section>

<script type="text/javascript" language="javascript">

    function updateStatus(Id, Status) {
        var urllink = '<?php echo $this->Url->build(["controller" => "SubCategories", "action" => "status"]); ?>';
        var id = Id;
        var status = Status;
        urllink = urllink + '/' + id + '/' + status;
        //alert(urllink);
        // alert(urllink);
        if (confirm("<?= __('Are you sure! you want to change subcategrie status?') ?>")) {
            $.ajax({
                url: urllink,
                type: 'GET',
                success: function (data) {

                    $('#status' + id).html(data);
                },
                error: function () {
                }
            });
        } else {
            return false;
        }
    }





</script>

