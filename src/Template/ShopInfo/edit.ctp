<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shopInfo->shop_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shopInfo->shop_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Shop Info'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="shopInfo form large-9 medium-8 columns content">
    <?= $this->Form->create($shopInfo) ?>
    <fieldset>
        <legend><?= __('Edit Shop Info') ?></legend>
        <?php
            echo $this->Form->control('shop_name');
            echo $this->Form->control('shop_url');
            echo $this->Form->control('closest_station');
            echo $this->Form->control('waik_time');
            echo $this->Form->control('wifi_cd');
            echo $this->Form->control('power_supply_cd');
            echo $this->Form->control('memo');
            echo $this->Form->control('create_user');
            echo $this->Form->control('create_datetime');
            echo $this->Form->control('update_user');
            echo $this->Form->control('update_datetime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
