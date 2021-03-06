<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('guestid');
            echo $this->Form->control('user_type');
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('email_verified');
            echo $this->Form->control('name');
            echo $this->Form->control('contact_person');
            echo $this->Form->control('photo');
            echo $this->Form->control('gender');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('location');
            echo $this->Form->control('active');
            echo $this->Form->control('verified');
            echo $this->Form->control('dob', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
