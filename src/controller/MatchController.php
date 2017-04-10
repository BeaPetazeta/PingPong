<?php

namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\MatchRepository;
use LeanProgrammers\Repository\RoundRepository;
use LeanProgrammers\Model\Round;

class MatchController{

    public function index(){

        $matches = MatchRepository::getAll();

        $view = new View('match');

        $view->render('index.php',['matches'=>$matches]);
    }

    public function show($id){
        $match = MatchRepository::getById($id);
        $round = new Round();
        if (!empty($_POST))  {
            $match->setPointsPlayer1($_POST['pointsPlayer1']);
            $match->setPointsPlayer2($_POST['pointsPlayer2']);
            
            // //Crear nueva ronda
            // $round = $match->getRound();
            // if(true == $round->checkPointsMatches()){
                
            // }
        }
       

        $view = new View('match');

        $view->render('show.php',['match'=>$match]);
    }



}
