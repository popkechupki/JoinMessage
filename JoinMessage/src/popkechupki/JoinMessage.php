<?php

namespace popkechupki; //このファイルが入っているフォルダを書く

use pocketmine\Plugin\PluginBase; //どのプラグインにも書きます。
use pocketmine¥event¥EventListener; //Eventを使うプラグインには必須
use pocketmine¥event¥PlayerJoinEvent; //プレイヤーがサーバーに入ってきた時に発生するイベント
use pocketmine\utils\TextFormat; //表示するチャットに色をつけられます。

class JoinMessage extends PluginBase implements Listener { //JoinMessageの所はこのファイルの名前
  
  function onEnable() { //プラグインを読み込む時の処理
    $this->getServer()->getPluginManager()->registerEvents($this,$this);  //イベントクォ使うプラグインには必須
  }
  
  function onJoin(PlayerJoinEvent $event) { //プレイヤーが参加した時の処理
    $player = $event->getPlayer(); //イベントからプレイヤーを取得
    $pName = $player->getName(); //上で取得したプレイヤーから名前を取得。
    $event->setJoinMessage(""); //デフォルトでは~~さんが参加しましたという黄色いメッセージ。""の中に入力すると変更されます。
    $this->getServer()->broadcastMessage(TextFormat::GREEN.$pName.TextFormat::WHITE."さんが参加しました！"); //メッセージを送信
  }
}
