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

namespace whitejing\punchingbag;

use whitejing\punchingbag\command\SummonCommand;

use pocketmine\plugin\PluginBase;

class PunchingBag extends PluginBase{
	
	/** @var string */
	public static $prefix = "§l§b[ §f샌드백§b ]§r";
	
	public function onEnable() : void{
		$this->getServer()->getCommandMap()->register("샌드백", new SummonCommand($this));
	}
}
