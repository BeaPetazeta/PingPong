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
    	// sacar capeonato p9or id
    	$championship = ChampionshipRepository::getById($id);            	//
    	$players = PlayerRepository::getAll();
        $currentUser = PlayerRepository::getById($_SESSION['userId']);
       // mostrar lista partidas de un campeonato.
        $view = new View('championship');
        $view->render('show.php', ['championship' => $championship, 'players' => $players, 'currentUser' => $currentUser]);
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


