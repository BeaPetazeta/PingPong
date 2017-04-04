<?php

namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\ChampionshipRepository;

class ChampionshipController
{
	
    public function index()
    {
        $players = ChampionshipRepository::getAll();

        $view = new View('championship');

        $view->render('index.php', ['players' => $players]);

    }
}

