<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program $program
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Program'), ['action' => 'edit', $program->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Program'), ['action' => 'delete', $program->id], ['confirm' => __('Are you sure you want to delete # {0}?', $program->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Programs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Categories'), ['controller' => 'SubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="programs view large-9 medium-8 columns content">
    <h3><?= h($program->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $program->has('user') ? $this->Html->link($program->user->name, ['controller' => 'Users', 'action' => 'view', $program->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $program->has('category') ? $this->Html->link($program->category->name, ['controller' => 'Categories', 'action' => 'view', $program->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Category') ?></th>
            <td><?= $program->has('sub_category') ? $this->Html->link($program->sub_category->name, ['controller' => 'SubCategories', 'action' => 'view', $program->sub_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($program->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($program->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($program->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($program->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($program->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Slug') ?></h4>
        <?= $this->Text->autoParagraph(h($program->slug)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($program->description)); ?>
    </div>
</div>
