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

    	//se hace una llamada al championshiprepository, para que nos devuelva el nombre del campeonato que le pasamos nosotros por Id.

    	$championship = ChampionshipRepository::getById($id) ;

        //se hace una llamada al championshiprepository, para que nos devuelva una lista de jugadores que pertenecen a un campeonato determinado que lo pasaremos por id.

       // $players = ChampionshipRepository::getPlayersChampionshipById($id) ;
        

       // mostrar lista partidas de un campeonato.

        $view = new View('championship');

        $view->render('show.php', ['championship' => $championship, 'players' => $championship->getPlayers()]);
 
    }
 
    
}

//AQUI HAY QUE HACER LA CONSULTA A LA BBDD

