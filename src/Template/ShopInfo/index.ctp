<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ShopInfo[]|\Cake\Collection\CollectionInterface $shopInfo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shop Info'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shopInfo index large-9 medium-8 columns content">
    <h3><?= __('Shop Info') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('shop_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shop_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('closest_station') ?></th>
                <th scope="col"><?= $this->Paginator->sort('waik_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wifi_cd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('power_supply_cd') ?></th>
                <th scope="col"><?= $this->Paginator->sort('memo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_datetime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_datetime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shopInfo as $shopInfo): ?>
            <tr>
                <td><?= $this->Number->format($shopInfo->shop_id) ?></td>
                <td><?= h($shopInfo->shop_name) ?></td>
                <td><?= h($shopInfo->shop_url) ?></td>
                <td><?= h($shopInfo->closest_station) ?></td>
                <td><?= $this->Number->format($shopInfo->waik_time) ?></td>
                <td><?= $this->Number->format($shopInfo->wifi_cd) ?></td>
                <td><?= $this->Number->format($shopInfo->power_supply_cd) ?></td>
                <td><?= h($shopInfo->memo) ?></td>
                <td><?= h($shopInfo->create_user) ?></td>
                <td><?= h($shopInfo->create_datetime) ?></td>
                <td><?= h($shopInfo->update_user) ?></td>
                <td><?= h($shopInfo->update_datetime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shopInfo->shop_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shopInfo->shop_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shopInfo->shop_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopInfo->shop_id)]) ?>
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
