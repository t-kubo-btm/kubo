<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Shop Info'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="shopInfo form large-9 medium-8 columns content">
    <?= $this->Form->create($shopInfo) ?>
    <fieldset>
<!--        <legend><?= __('登録') ?></legend>-->
        <h3><?= __('登録') ?></h3>
        <?php
            echo "<table><tr>";
	    echo "<th class=\"midasi\">店名</th>";
            echo "<td>".$this->Form->input('shop_name', ["label" => FALSE])."</td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">URL</th>";
            echo "<td>".$this->Form->input('shop_url', ["label" => FALSE])."</td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">最寄駅</th>";
            echo "<td>".$this->Form->input('closest_station', ["label" => FALSE])."</td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">駅徒歩</th>";
            echo "<td>".$this->Form->input('waik_time', ["label" => FALSE])."</td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">営業時間</th>";
            echo "<td><label class=\"inputform\">".$this->Form->input('business_hours_from', ["label" => FALSE]);
            echo "～　".$this->Form->input('business_hours_to', ["label" => FALSE])."</label></td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">Free WiFi</th>";
            echo "<td>".$this->Form->radio('wifi_cd',[
                ["value" => 0, "text" => "なし"],
                ["value" => 1, "text" => "あり"],
                ["value" => 9, "text" => "不明"]
            ])."</td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">電源</th>";
            echo "<td>".$this->Form->radio('power_supply_cd',[
                ["value" => 0, "text" => "なし"],
                ["value" => 1, "text" => "あり"],
                ["value" => 9, "text" => "不明"]
            ])."</td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">登録者</th>";
            echo "<td>".$this->Form->select('user_id', $disp)."</td>";
            echo "</tr><tr>";
            echo "<th class=\"midasi\">memo</th>";
            echo "<td>".$this->Form->text('memo')."</td>";
            echo "</tr></table>";

//            echo $this->Form->input('shop_name');/* 店名 */
//            echo $this->Form->text('shop_url',["class" => "inputform"]);/* URL */
//            echo $this->Form->input('shop_url');/* URL */
//            echo $this->Form->input('closest_station');/* 最寄駅 */
//            echo $this->Form->input('waik_time');/* 駅徒歩 */
//            echo $this->Form->input('business_hours_from');/* 営業時間_from */
//            echo $this->Form->input('business_hours_to');/* 営業時間_to */
//            echo $this->Form->input('wifi_cd');/* Free WiFi */
//            echo $this->Form->input('power_supply_cd');/* 電源 */
//            echo $this->Form->input('user_id');/* 登録者 */
//            echo $this->Form->input('memo');/* メモ */

//            echo $this->Form->input('create_user');
//            echo $this->Form->input('create_datetime');
//            echo $this->Form->input('update_user');
//            echo $this->Form->input('update_datetime');
/*            

        <?= $this->Form->button(__('Submit')) ?>


*/         
        ?>
    </fieldset>
    <div class="parent">
        <div class="inner">
            <?= $this->Form->button(__('登録')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
