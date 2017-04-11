<?php

namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\ChampionshipRepository;
use LeanProgrammers\Repository\PlayerRepository;
use LeanProgrammers\Model\Championship;

class ChampionshipController
{

    public function index()
    {
        if(isset($_POST['newChampionship'])){
            $championship = new Championship($_POST['championshipname']);
            $championship->save();
        }
        $championships = ChampionshipRepository::getAll();
        $view = new View('championship');
        $view->render('index.php', ['championships' => $championships]);
    }


     public function show($id)
    {
        $championship = ChampionshipRepository::getById($id);
        $currentUser = PlayerRepository::getById($_SESSION['userId']);
        if(isset($_POST['newPlayer'])){
            $currentUser->inscribe($championship);
            $championship = ChampionshipRepository::getById($id);
        }
    	$view = new View('championship');
        $view->render('show.php', ['championship' => $championship, 'currentUser' => $currentUser]);
    }

    public function edit($id)
    {
        $championship = ChampionshipRepository::getById($id);
        if(!empty($_POST)){
            $championship->setName($_POST['name']);
            $championship->save();
        }
        $players = PlayerRepository::getAll() ;
        $view = new View('championship');
        $view->render('edit.php', ['championship' => $championship, 'players' => $players]);
    }



}


