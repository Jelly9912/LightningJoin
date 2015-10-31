<?php

namespace Light;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\Listener;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\network\protocol\SetTimePacket;
use pocketmine\network\protocol\TextPacket;
use pocketmine\network\protocol\AddPlayerPacket;
use pocketmine\entity\Entity;

class Main extends PluginBase implements Listener {

    public function onEnable(){
    	$this->getLogger()->info("LightingJoin enabled!");
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
   
    public function onJoin(PlayerJoinEvent $e){
	$p = $e->getPlayer();
	$light = new AddEntityPacket();
        $light->type = 93;
        $light->eid = Entity::$entityCount++;
        $light->metadata = array();
        $light->speedX = 0;
        $light->speedY = 0;
        $light->speedZ = 0;
        $light->yaw = $p->getYaw();
        $light->pitch = $p->getPitch();
        $light->x = $p->x;
        $light->y = $p->y;
        $light->z = $p->z;
        $p->dataPacket($light);
     }
    	
    public function onRespawn(PlayerRespawnEvent $e){
   $p = $e->getPlayer();
  $light = new AddEntityPacket();
        $light->type = 93;
        $light->eid = Entity::$entityCount++;
        $light->metadata = array();
        $light->speedX = 0;
        $light->speedY = 0;
        $light->speedZ = 0;
        $light->yaw = $p->getYaw();
        $light->pitch = $p->getPitch();
        $light->x = $p->x;
        $light->y = $p->y;
        $light->z = $p->z;
        $p->dataPacket($light);
     }	
  }
