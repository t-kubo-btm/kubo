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
            echo $this->Form->input('shop_name');
            echo $this->Form->input('shop_url');
            echo $this->Form->input('closest_station');
            echo $this->Form->input('waik_time');
            echo $this->Form->input('business_hours_from');
            echo $this->Form->input('business_hours_to');
            echo $this->Form->input('wifi_cd');
            echo $this->Form->input('power_supply_cd');
            echo $this->Form->input('memo');
            echo $this->Form->input('create_user');
            echo $this->Form->input('create_datetime');
            echo $this->Form->input('update_user');
            echo $this->Form->input('update_datetime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
