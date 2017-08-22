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
    <title>検索画面</title>
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
    <?= $this->Form->create("", ['controller' => 'ShopInfo', 'url' => '/ShopInfo/search', 'type' => 'post']) ?>
    <fieldset>
      <legend><?= __('検索') ?></legend>
   <div id="regist"> 
     <table class="registration">
        <tr>
          <td><?= __('WiFi有無') ?><td>
          <td><?php

                 echo $this->Form->multiCheckbox('wifi_cd',
                       [
                         ['value' => '1', 'text' => 'あり'], 
                         ['value' => '0', 'text' => 'なし'],
                       ]);
              ?></td>
        </tr>
        <tr>
          <td><?= __('電源有無') ?><td>
          <td><?php
                 echo $this->Form->multiCheckbox('power_supply_cd',
                       [
                         ['value' => '1', 'text' => 'あり'],
                         ['value' => '0', 'text' => 'なし'],
                       ]);
               ?></td>
        </tr>
        <tr>
          <td><?= __('最寄駅') ?><td>
          <td><?php
                   echo $this->Form->input('closest_station',
                                          ['type' => 'select',
                                           'options' => $arr_closest_station,
                                           'id' => "closest_station",
                                           'class' => 'closest_station',
                                           'empty' => true,
                                           'default' => '-',
                                           'label' => false,
                                           ]);
                ?></td>
        </tr>
        <tr>
          <td><?= __('徒歩') ?><td>
          <td><?php
                   echo $this->Form->input('waik_time', ['label' => false]);
                 ?>分
          </td>
        </tr>
        <tr>
          <td><?= __('登録者') ?><td>
          <td><?php
                   echo $this->Form->input('create_user',
                                          ['type' => 'select',
                                           'options' => $arr_create_user,
                                           'id' => "create_user",
                                           'class' => 'class_name',
                                           'empty' => true,
                                           'default' => '-',
                                           'label' => false,
                                           ]);
                ?></td>
        </tr>
        <tr>
          <td><?= __('店名') ?><td>
          <td><?php
                   echo $this->Form->input('shop_name', ['label' => false]);
                 ?>
          </td>
        </tr>
        <tr>
          <td colspan="3"><?= $this->Form->button(__('検索'), ['name' => 'search']) ?></td>
        </tr>
     </table>
  </div>
  <div id="search">
    <p>検索結果：
       <?php if(!Empty($search_result)){ ?>
       <?php echo count($search_result);  ?>件
       <?php }else{ ?>
       0件
       <?php } ?>
    </p>
    <table class="search">
    <?php foreach ($search_result as $shopInfo): ?>

      <tr>
        <td rowspan="5" class="center">
          <div class="checkbox">
            <label for="categories-aaa" class="selected">
              <input type="checkbox" name="categories[]" value="" id="delchk_<?php echo $shopInfo['shop_id'] ;?>">
            </label>
          </div></td>
        <td colspan="6">
          <?php echo $this->Html->link(
                      $shopInfo->shop_name,
                      $shopInfo->shop_url,
                      ['target' => '_blank']
                       );
           ?></td>
      </tr>
      <tr>
        <td class="table_title center">最寄駅</td>
        <td class="table_title center">徒歩</td>
        <td class="table_title center">営業時間(平日)</td>
        <td class="table_title center">FreeWifi</td>
        <td class="table_title center">電源</td>
        <td class="table_title center">登録者</td>
      </tr>
      <tr>
        <td class="center"><?= h($shopInfo->closest_station) ?></td>
        <td class="center"><?= $this->Number->format($shopInfo->waik_time) ?>分</td>
        <!-- <td class="center"><?= $this->Time->format($shopInfo->business_hours_from) ?> -->
        <td class="center"><?= date("H:i", strtotime($shopInfo->business_hours_from)) ?>
                            -
                           <?= date("H:i", strtotime($shopInfo->business_hours_to)) ?></td>
        <td class="center">
          <?php if($this->Number->format($shopInfo->wifi_cd) == 1): ?>
            ○
          <?php elseif($this->Number->format($shopInfo->wifi_cd) == 0): ?>
            ×
          <?php elseif($this->Number->format($shopInfo->wifi_cd) == 9): ?>
            不明
          <?php endif; ?>
        </td>
        <td class="center">
          <?php if($this->Number->format($shopInfo->power_supply_cd) == 1): ?>
            ○
          <?php elseif($this->Number->format($shopInfo->power_supply_cd) == 0): ?>
            ×
          <?php elseif($this->Number->format($shopInfo->power_supply_cd) == 9): ?>
            不明
          <?php endif; ?>
        </td>
        <td class="center"><?= h($shopInfo->update_user) ?></td>
      </tr>
      <tr>
        <td colspan="6" class="table_title">memo</td>
      </tr>
      <tr>
        <td colspan="6"><?= h($shopInfo->memo) ?></td>
      </tr>
    <?php endforeach; ?>
    </table>
</div>



    </fieldset>
    <?= $this->Form->end() ?>
  </div>
</body>
</html>
