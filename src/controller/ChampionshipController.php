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
}

//AQUI HAY QUE HACER LA CONSULTA A LA BBDD

