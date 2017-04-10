<?php
namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\PlayerRepository;
use LeanProgrammers\Repository\MatchRepository;

class PlayerController
{
    public function index()
    {
        $players = PlayerRepository::getAll();

        $view = new View('player');

        $view->render('index.php', ['players' =>$players]);

    }
    public function show($id){
    	$player=PlayerRepository::getById($id);
        $matches=MatchRepository::getAllByPlayerId($id);

    	$view = new View('player');
    	$view->render('show.php',['player'=>$player,'matches'=>$matches]);
    }
}
