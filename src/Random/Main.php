<?php

namespace Random;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase {
  
  public $nicks = ["LALA", "HUHU", "HAHA", "BubugagaLp", "Binika", "Susages", "Bread", "Apple", "Lips", "BoyGotLove", "Kane", "School", "Lunch", "Dinner", "Breakfast", "Kiss", "Heart", "Newbie", "GirlGotLove", "Sing", "Horns", "Boons", "Lungs", "Stranger", "Pretty", "Scriminal", "Scammy", "MehAlt", "Strangle", "PvPGod123" ",ZImpersonate", "123Lol456", "ColdPlay", "Doni", "VMPE"];
  
  public function onEnable(){
    $this->getLogger()->info(C::GREEN."Activated!");
  }
  public function onDisable(){
    $this->getLogger()->info(C::RED."Deactivated!");
  }
  public function action_nick_on($player){
		if(count($this->nicks) === 1){
			$player->setDisplayName($this->nicks[0]);
			$player->setNameTag($this->nicks[0]);
			$pName = $player->getDisplayName();
			unset($this->nicks[0]);
			$this->nicks = array_values($this->nicks);
			$player->sendMessage(C::BOLD.C::GRAY."§r§6[".C::BLUE."§5VMPENick".C::GRAY."§6]".C::YELLOW."§r§3Your nick name, is now ".C::BLUE.$player->getDisplayName().C::YELLOW."§r§3!");
		}
		elseif(count($this->nicks) === 0){
			$player->sendMessage(C::BOLD.C::GRAY."§r§6[".C::BLUE."§5VMPENick".C::GRAY."§6]".C::RED."Sorry, but there are No Nick Names Aviable!");
		}
		else{
			$nickNum = mt_rand(0, count($this->nicks)-1);
			$player->setDisplayName($this->nicks[$nickNum]);
			$player->setNameTag($this->nicks[$nickNum]);
			$pName2 = $player->getDisplayName();
			unset($this->nicks[$nickNum]);
			$this->nicks = array_values($this->nicks);
			$player->sendMessage(C::BOLD.C::GRAY."§r§6[".C::BLUE."§5VMPENick".C::GRAY."§6]".C::YELLOW."§r§3Your Nick Name is now ".C::BLUE.$player->getDisplayName().C::YELLOW."§3!");
		}
	}
	public function action_nick_off($player){
		array_push($this->nicks, $player->getDisplayName());
		$player->setDisplayName($player->getName());
		$player->setNameTag($player->getName());
	}
  public function onCommand(CommandSender $sender, Command $command, string $label, array $args) :bool {
    switch(strtolower($command->getName())){
      case "nick":
        if(strtolower($args[0]) === "on"){
        	$this->action_nick_on($sender);
        }
        elseif(strtolower($args[0]) === "off"){
        	$this->action_nick_off($sender);
        return true;
        break;
    }
  }
}
