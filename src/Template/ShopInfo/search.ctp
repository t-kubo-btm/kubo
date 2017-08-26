<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shop Info'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shopInfo index large-9 medium-8 columns content">
    <h3><?= __('検索') ?></h3>
    <?= $this->Form->create("", ['controller' => 'ShopInfo', 'url' => '/ShopInfo/search', 'type' => 'post']) ?>
    <table><tr>
    <th class="midasi">Free WiFi</th>
    <td><?= $this->Form->multicheckbox('wifi_cd',[
        ["value" => 1, "text" => "あり"],
        ["value" => 0, "text" => "なし"]
        ]) ?></td>
    </tr><tr>
    <th class="midasi">電源</th>
    <td><?= $this->Form->multicheckbox('power_supply_cd',[
        ["value" => 1, "text" => "あり"],
        ["value" => 0, "text" => "なし"]
        ]) ?></td>
    </tr><tr>
    <th class="midasi">最寄駅</th>
    <td><?= $this->Form->input('closest_station', ["label" => FALSE]) ?></td>
    </tr><tr>
    <th class="midasi">駅徒歩</th>
    <td><label class="inputform"><?= $this->Form->input('waik_time', ["label" => FALSE]) ?>分以内</label></td>
    </tr><tr>
    <th class="midasi">登録者</th>
    <td><?= $this->Form->select('user_id', $disp) ?></td>
    </tr><tr>
    <th class="midasi">店名</th>
    <td><?= $this->Form->input('shop_name', ["label" => FALSE]) ?></td>
    </tr></table>
    
    <div class="parent">
        <div class="inner">
            <?= $this->Form->button(__('検索')) ?>
        </div>
    </div>
    
    <?php if(!Empty($disp_um)){ ?>
        <?php foreach ($disp_um as $disp_um): ?>
            <table><tr>
                <td rowspan="5">
                  <?= $this->Form->checkbox('result_check') ?>
                </td>
                <td colspan="6"><a href="<?= h($disp_um->shop_url) ?>" target=blank>
            <?= h($disp_um->shop_name) ?></a></td>
            </tr><tr>
                <td>最寄り駅</td>
                <td>徒歩</td>
                <td>営業時間（平日）</td>
                <td>Free WiFi</td>
                <td>電源</td>
                <td>登録者</td>
            </tr><tr>
                <td><?= h($disp_um->closest_station) ?></td>
                <td><?= $this->Number->format($disp_um->waik_time) ?></td>
                <td><?= h($disp_um->business_hours_from) ?>
                <?= h($disp_um->business_hours_to) ?></td>
                <td><?= $this->Number->format($disp_um->wifi_cd) ?></td>
                <td><?= $this->Number->format($disp_um->power_supply_cd) ?></td>
                <td><?= h($disp_um->create_user) ?></td>                
            </tr><tr>
                    <td>memo</td>
                </tr><tr>
                    <td colspan="6"><?= h($disp_um->memo) ?></td>
            </tr></table>

        <?php endforeach; ?>
    <?php } ?>
</div>
    <?= $this->Form->end() ?>

