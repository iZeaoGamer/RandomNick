<?php

namespace Random;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
    $this->getLogger()->info(C::GREEN."Activated!");
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  public function onDisable(){
    $this->getLogger()->info(C::RED."Deactivated!");
  }
