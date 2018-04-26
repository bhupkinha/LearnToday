<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program[]|\Cake\Collection\CollectionInterface $programs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Program'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Categories'), ['controller' => 'SubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="programs index large-9 medium-8 columns content">
    <h3><?= __('Programs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($programs as $program): ?>
            <tr>
                <td><?= $this->Number->format($program->id) ?></td>
                <td><?= $program->has('user') ? $this->Html->link($program->user->name, ['controller' => 'Users', 'action' => 'view', $program->user->id]) : '' ?></td>
                <td><?= $program->has('category') ? $this->Html->link($program->category->name, ['controller' => 'Categories', 'action' => 'view', $program->category->id]) : '' ?></td>
                <td><?= $program->has('sub_category') ? $this->Html->link($program->sub_category->name, ['controller' => 'SubCategories', 'action' => 'view', $program->sub_category->id]) : '' ?></td>
                <td><?= $this->Number->format($program->status) ?></td>
                <td><?= h($program->created) ?></td>
                <td><?= h($program->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $program->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $program->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $program->id], ['confirm' => __('Are you sure you want to delete # {0}?', $program->id)]) ?>
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
    </div>
</div>
