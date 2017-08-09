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
                ['action' => 'delete', $userMaster->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userMaster->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User Master'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userMaster form large-9 medium-8 columns content">
    <?= $this->Form->create($userMaster) ?>
    <fieldset>
        <legend><?= __('Edit User Master') ?></legend>
        <?php
            echo $this->Form->control('user_name');
            echo $this->Form->control('effect_flg');
            echo $this->Form->control('create_user');
            echo $this->Form->control('create_datetime');
            echo $this->Form->control('update_user');
            echo $this->Form->control('update_datetime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
