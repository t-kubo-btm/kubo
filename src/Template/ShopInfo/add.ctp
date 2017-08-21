<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面</title>
    <?= $this->Html->css('btm_cafe_common.css') ?>
</head>
<body>
  <nav class="large-3 medium-4 columns" id="actions-sidebar">
      <ul class="side-nav">
          <li class="heading"><?= __('Actions') ?></li>
          <li><?= $this->Html->link(__('List Shop Info'), ['action' => 'index']) ?></li>
      </ul>
  </nav>
  <div class="shopInfo form large-9 medium-8 columns content">
    <?= $this->Form->create($shopInfo) ?>
    <fieldset>
      <legend><?= __('登録') ?></legend>
        <table class="registration">
          <tr>
            <td id='required'><?= __('店名') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php
                   echo $this->Form->input('shop_name',['label' => false]);
                 ?></td>
          </tr>
          <?php
            if(!Empty($errors['shop_name']['length'])){
          ?>
          <tr>
            <td><td>
            <td id='error_msg'><?php
                   echo $errors['shop_name']['length'];
                ?></td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td><?= __('URL') ?><td>
            <td><?php
                   echo $this->Form->input('shop_url',['label' => false]);
                 ?></td>
          </tr>
          <?php
            if(!Empty($errors['shop_url']['length'])){
          ?>
          <tr>
            <td><td>
            <td id='error_msg'><?php 
                   echo $errors['shop_url']['length'];
                 ?></td>
          </tr>
          <?php
            }
          ?>
          <?php
            if(!Empty($errors['shop_url']['format'])){
          ?>
          <tr>
            <td><td>
            <td id='error_msg'><?php
                   echo $errors['shop_url']['format'];
                 ?></td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td id='required'><?= __('最寄駅') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php
                   echo $this->Form->input('closest_station', ['label'=>false]);
                  ?></td>
          </tr>
          <?php
            if(!Empty($errors['closest_station']['length'])){
          ?>
          <tr>
            <td><?= __('') ?><td>
            <td id='error_msg'><?php
                  echo $errors['closest_station']['length'];
                 ?></td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td id='required'><?= __('徒歩') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php //徒歩
                   echo $this->Form->input('waik_time', ['label'=>false]);
                 ?></td>
          </tr>
          <?php
            if(!Empty($errors['waik_time']['format'])){
          ?>
          <tr>
            <td><td>
            <td id='error_msg'><?php
                     echo $errors['waik_time']['format'];
                ?></td>
          </tr>
          <?php
            }
          ?>
          <?php
            if(!Empty($errors['waik_time']['range'])){
          ?>
          <tr>
            <td><td>
            <td id='error_msg'><?php
                  echo $errors['waik_time']['range'];
                ?></td>
          </tr>
          <?php
            }
          ?>
          <tr>
            <td id='required'><?= __('営業時間（開始）') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php
                   echo $this->Form->input('business_hours_from', ['label'=>false]);
                ?></td>
          </tr>
          <tr>
            <td id='required'><?= __('営業時間（終了）') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php
                   echo $this->Form->input('business_hours_to', ['label'=>false]);
                 ?></td>
          </tr>
          <tr>
            <td id='required'><?= __('WiFi有無') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php
                   echo $this->Form->radio('wifi_cd',
                         [['value' => '1', 'text' => 'あり', 'checked' => 'true'],
                          ['value' => '0', 'text' => 'なし'],
                          ['value' => '9', 'text' => '不明'],
                         ]);
                ?></td>
          </tr>
          <tr>
            <td id='required'><?= __('電源有無') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php
                   echo $this->Form->radio('power_supply_cd',
                              [['value' => '1', 'text' => 'あり', 'checked' => 'true'],
                               ['value' => '0', 'text' => 'なし',],
                               ['value' => '9', 'text' => '不明',],
                              ]);
                 ?></td>
          </tr>
          <tr>
            <td><?= __('memo') ?><td>
            <td><?php //メモ
                   echo $this->Form->input('memo', ['label'=>false]);
                ?></td>
          </tr>
          <tr>
            <td><td>
            <td id='error_msg'><?php //メモ
                   if(!Empty($errors['memo']['length'])){
                     echo $errors['memo']['length'];
                   }
                ?></td>
          </tr>
          <tr>
            <td id='required'><?= __('登録者') ?><span id='required_mark'><?= __('*') ?></span><td>
            <td><?php
                   echo $this->Form->input('create_user',
                                          ['type' => 'select',
                                           'options' => $new_users,
                                           'id' => "create_user",
                                           'class' => 'class_name',
                                           'empty' => true,
                                           'default' => '-',
                                           'label' => false]);
               ?></td>
          </tr>
        </table>
      </fieldset>
      <?= $this->Form->button(__('登録')) ?>
      <?= $this->Form->end() ?>
  </div>
</body>
</html>
