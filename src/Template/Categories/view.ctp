<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Categorys'), ['controller' => 'SubCategorys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategorys', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($category->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Type') ?></th>
            <td><?= $this->Number->format($category->category_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($category->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($category->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visibility') ?></th>
            <td><?= $this->Number->format($category->visibility) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($category->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($category->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($category->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($category->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sub Categorys') ?></h4>
        <?php if (!empty($category->sub_categorys)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Visibility') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->sub_categorys as $subCategorys): ?>
            <tr>
                <td><?= h($subCategorys->id) ?></td>
                <td><?= h($subCategorys->name) ?></td>
                <td><?= h($subCategorys->category_id) ?></td>
                <td><?= h($subCategorys->slug) ?></td>
                <td><?= h($subCategorys->description) ?></td>
                <td><?= h($subCategorys->status) ?></td>
                <td><?= h($subCategorys->visibility) ?></td>
                <td><?= h($subCategorys->created) ?></td>
                <td><?= h($subCategorys->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SubCategorys', 'action' => 'view', $subCategorys->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SubCategorys', 'action' => 'edit', $subCategorys->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SubCategorys', 'action' => 'delete', $subCategorys->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCategorys->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
