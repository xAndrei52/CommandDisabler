<?php

namespace Bumbumkill\CommandDisabler;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

public $cmd;

public function onEnable(){
    @mkdir($this->getDataFolder());
		$this->saveResource("commands.yml");
		$data = new Config($this->getDataFolder()."commands.yml", Config::YAML);
		$this->cmd = $data->get("cmd");
	}
public function disableCommand(){
		$cmp = $this->getServer()->getCommandMap();
		foreach($this->cmd as $cmdlist){
		         $result = $map->getCommand($cmdname);
		          $cmp->unregister($result);
		}
		return true;
	}
}
