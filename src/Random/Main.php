<?php

namespace Random;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;

class Main extends PluginBase {
  
  public function onEnable(){
    $this->getLogger()->info(C::GREEN."Activated!");
  }
  public function onDisable(){
    $this->getLogger()->info(C::RED."Deactivated!");
  }
  
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    switch(strtolower($command)){
      case "nick":
        if(count($args) != 1){
          $sender->sendMessage(C::WHITE."Use".C::GRAY.":".C::GOLD."/Nick Random");
          $sender->sendTip(C::WHITE."Use".C::GRAY.":".C::GOLD."/Nick Random");
