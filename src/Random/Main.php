<?php

namespace Random;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
    $this->getLogger()->info(C::GREEN."Activated!");
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
  }
  public function onDisable(){
    $this->getLogger()->info(C::RED."Deactivated!");
  }
  
  public function onCommand(CommandSender $s, Command $cmd, array $args){
    switch(strtolower($cmd)){
      case "nick":
        if(count($args) != 1){
                    $sender->sendMessage(C::ORANGE."Usage : /nick random");
                    return;
        }
