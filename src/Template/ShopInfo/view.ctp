<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ShopInfo $shopInfo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shop Info'), ['action' => 'edit', $shopInfo->shop_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shop Info'), ['action' => 'delete', $shopInfo->shop_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shopInfo->shop_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shop Info'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shop Info'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shopInfo view large-9 medium-8 columns content">
    <h3><?= h($shopInfo->shop_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Shop Name') ?></th>
            <td><?= h($shopInfo->shop_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Url') ?></th>
            <td><?= h($shopInfo->shop_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Closest Station') ?></th>
            <td><?= h($shopInfo->closest_station) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Memo') ?></th>
            <td><?= h($shopInfo->memo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create User') ?></th>
            <td><?= h($shopInfo->create_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update User') ?></th>
            <td><?= h($shopInfo->update_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shop Id') ?></th>
            <td><?= $this->Number->format($shopInfo->shop_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Waik Time') ?></th>
            <td><?= $this->Number->format($shopInfo->waik_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wifi Cd') ?></th>
            <td><?= $this->Number->format($shopInfo->wifi_cd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Power Supply Cd') ?></th>
            <td><?= $this->Number->format($shopInfo->power_supply_cd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Datetime') ?></th>
            <td><?= h($shopInfo->create_datetime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update Datetime') ?></th>
            <td><?= h($shopInfo->update_datetime) ?></td>
        </tr>
    </table>
</div>
