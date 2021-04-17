<?php

namespace MintoD\PlayerBar;

use pocketmine\Player;
use pocketmine\scheduler\Task;
use MintoD\PlayerBar\Main;

class Bar extends Task {
    public int $currentTick = 10;
    private Main $plugin;
    private $player;

    public function __construct(Main $plugin, $player)
    {
        $this->plugin = $plugin;
        $this->player = $player;
    }
    public function onRun(int $currentTick)
    {
        $player = $this->plugin->getServer()->getPlayerExact($this->player);
        if($player instanceof Player) {
            $player->sendTip("Ping: " . $player->getPing() . " | " . "TPS: " . $this->plugin->getServer()->getTicksPerSecond());
            if($this->currentTick == 1) {
                $this->plugin->getScheduler()->cancelTask($this->getTaskId());
            }
        }
        $this->currentTick++;
    }
}