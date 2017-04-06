<?php

namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\MatchRepository;

class MatchController{

    public function index(){

        $matches = MatchRepository::getAll();

        $view = new View('match');

        $view->render('index.php',['matches'=>$matches]);
    }

    public function show($id){

        $match = MatchRepository::getById($id);

        $view = new View('match');

        $view->render('show.php',['match'=>$match]);
    }


}
