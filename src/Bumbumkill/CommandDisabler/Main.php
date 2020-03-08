<?php

namespace Bumbumkill\CommandDisabler;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

private $commands;
public function onEnable(){
    @mkdir($this->getDataFolder());
		$this->saveResource("commands.yml");
		$data = new Config($this->getDataFolder()."commands.yml", Config::YAML);
		$this->commands = $data->get("cmd");
                $this->disableCommand();
	}
public function disableCommand(){
		$cmp = $this->getServer()->getCommandMap();
		foreach($this->commands as $cmdlist){
		         $result = $cmp->getCommand($cmdlist);
		          $cmp->unregister($result);
		}
		return true;
	}
}
