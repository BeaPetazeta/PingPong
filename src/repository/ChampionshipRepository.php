<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Model\Championship;

class ChampionshipRepository
{
	$players = [
		1 => "Adri",
		2 => "Bea",
		3 => "Miguel",
		4 => "Emilio",
		5 => "Gabi",
		6 => "David",
		7 => "Jorge",
		8 => "Mario",
		9 => "Paco",
		10 => "Elena"
	];
    static public function getAll(){
        return $players;
    }
}