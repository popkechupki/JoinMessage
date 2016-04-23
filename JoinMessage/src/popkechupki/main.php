<?php

namespace popkechupki;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class main extends PluginBase implements Listener{ 

	public function onEnable(){
        $plugin = "PocketJobsPlus";                                        
    $this->getLogger()->info(TextFormat::GREEN.$plugin."を読み込みました".TextFormat::GOLD." By popkechupki");
    $this->getLogger()->info(TextFormat::RED."このプラグインはpopke LICENSEに同意した上で使用してください。");                
        $this->getServer()->getPluginManager()->registerEvents($this,$this);

	if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0740, true);
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
		array(
			'一行目' => '〇〇サーバーへようこそ！'
            ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
        array(
			'二行目' => 'このサーバーでは〇〇ができます！'
            ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
        array(
			'三行目' => 'どうぞお楽しみください！'
			));
	
        $this->config->save();

    }

    public function onPlayerJoin(PlayerJoinEvent $event) {
    	$player = $event->getPlayer();
        $date1 = $this->config->get("一行目");
        $date2 = $this->config->get("二行目");
        $date3 = $this->config->get("三行目");
    	$player->sendMessage("§b+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+§r");
        $player->sendMessage("$date1");
        $player->sendMessage("$date2");
        $player->sendMessage("$date3");
    	$player->sendMessage("§b+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+§r");
    }
}

