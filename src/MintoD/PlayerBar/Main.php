<?php

namespace MintoD\PlayerBar;

use pocketmine\{Server, Player};
use pocketmine\plugin\PLuginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use MintoD\PlayerBar\Bar;

class Main extends PLuginBase implements Listener {
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onJoin(PlayerJoinEvent $e) {
        $player = $e->getPlayer();
        $this->getScheduler()->scheduleRepeatingTask(new Bar($this, $player->getName()), 20);
    }
}