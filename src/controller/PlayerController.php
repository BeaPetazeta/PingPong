<?php
namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\PlayerRepository;

class PlayerController
{
    public function index()
    {
        $players = PlayerRepository::getAll();

        $view = new View('player');

        $view->render('index.php', ['players' =>$players]);

    }
}
