<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\UserMaster[]|\Cake\Collection\CollectionInterface $userMaster
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Master'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userMaster index large-9 medium-8 columns content">
    <h3><?= __('User Master') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('effect_flg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_datetime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_datetime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userMaster as $userMaster): ?>
            <tr>
                <td><?= $this->Number->format($userMaster->user_id) ?></td>
                <td><?= h($userMaster->user_name) ?></td>
                <td><?= $this->Number->format($userMaster->effect_flg) ?></td>
                <td><?= h($userMaster->create_user) ?></td>
                <td><?= h($userMaster->create_datetime) ?></td>
                <td><?= h($userMaster->update_user) ?></td>
                <td><?= h($userMaster->update_datetime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userMaster->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userMaster->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userMaster->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMaster->user_id)]) ?>
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
