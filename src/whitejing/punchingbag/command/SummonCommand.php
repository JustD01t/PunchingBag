<?php

/*
 *
 * __        ___     _ _           _ _
 * \ \      / / |__ (_) |_ ___    | (_)_ __   __ _
 *  \ \ /\ / /| '_ \| | __/ _ \_  | | | '_ \ / _` |
 *   \ V  V / | | | | | ||  __/ |_| | | | | | (_| |
 *    \_/\_/  |_| |_|_|\__\___|\___/|_|_| |_|\__, |
 *                                           |___/
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @author WhiteJing
 * @link https://github.com/JustD01t/PunchingBag
 * 
 * @team JustD01t (https://github.com/JustD01t/)
 * 
 * 
*/

declare(strict_types=1);

namespace whitejing\punchingbag\command;

use whitejing\punchingbag\PunchingBag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Entity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\ListTag;

class SummonCommand extends Command{
	
	private $plugin;
	
	public function __construct(PunchingBag $plugin){
		parent::__construct("샌드백", "샌드백 좀비 소환", "/샌드백");
		$this->setPermission("punchingbag.summon.use");
		
		$this->plugin = $plugin;
	}
	
	public function execute(CommandSender $sender, string $label, array $args):bool{
		
		$type = Entity::ZOMBIE;
		
		$world = $this->plugin->getServer()->getLevelByName("world");
		
		$nbt = new CompoundTag("", [
			"Pos"=>new ListTag("Pos", [
				new DoubleTag("", $sender->getX()),
				new DoubleTag("", $sender->getY()),
				new DoubleTag("", $sender->getZ())
			]),
			"Motion"=>new ListTag("Motion", [
				new DoubleTag("", 0),
				new DoubleTag("", 0),
				new DoubleTag("", 0)
			]),
			"Rotation"=>new ListTag("Rotation", [
				new FloatTag("", 0),
				new FloatTag("", 0)
				
			])
		]);
		
		$entity = Entity::createEntity($type, $world, $nbt);
		$entity->spawnToAll();
		
		$sender->sendMessage(PunchingBag::$prefix . " 샌드백 소환");
		
		return true;
	}
}
