<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\UserMaster $userMaster
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Master'), ['action' => 'edit', $userMaster->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Master'), ['action' => 'delete', $userMaster->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMaster->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Master'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Master'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userMaster view large-9 medium-8 columns content">
    <h3><?= h($userMaster->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= h($userMaster->user_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create User') ?></th>
            <td><?= h($userMaster->create_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update User') ?></th>
            <td><?= h($userMaster->update_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($userMaster->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Effect Flg') ?></th>
            <td><?= $this->Number->format($userMaster->effect_flg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Datetime') ?></th>
            <td><?= h($userMaster->create_datetime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Datetime') ?></th>
            <td><?= h($userMaster->update_datetime) ?></td>
        </tr>
    </table>
</div>
