<?php

namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\ChampionshipRepository;
use LeanProgrammers\Repository\PlayerRepository;

class ChampionshipController
{

    public function index()
    {
        $championships = ChampionshipRepository::getAll();

        $view = new View('championship');

        $view->render('index.php', ['championships' => $championships]);

    }


     public function show($id)
    {

    	// sacar capeonato p9or id

    	$championship = ChampionshipRepository::getById($id) ;

    	//
    	$players = PlayerRepository::getAll() ;

       // mostrar lista partidas de un campeonato.

        $view = new View('championship');

        $view->render('show.php', ['championship' => $championship, 'players' => $players]);

    }

    public function edit($id)
    {

        $championship = ChampionshipRepository::getById($id) ;

        if(!empty($_POST)){
            $championship->setName($_POST['name']);
            $championship->save();
        }

        $players = PlayerRepository::getAll() ;

        $view = new View('championship');

        $view->render('edit.php', ['championship' => $championship, 'players' => $players]);

    }
}


