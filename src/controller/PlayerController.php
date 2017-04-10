<?php
namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\PlayerRepository;
use LeanProgrammers\Repository\MatchRepository;
use LeanProgrammers\Controller\PageController;

class PlayerController
{
    public function index()
    {
        $players = PlayerRepository::getAll();

        $view = new View('player');

        $view->render('index.php', ['players' =>$players]);

    }

    public function show($id)
    {
    	$player=PlayerRepository::getById($id);
        $matches=MatchRepository::getAllByPlayerId($id);

    	$view = new View('player');
    	$view->render('show.php',['player'=>$player,'matches'=>$matches]);
    }

    public function login()
    {        
        if(isset($_POST['password'])){
            $player = PlayerRepository::existYet($_POST['email'], $_POST['password']);
            if($player != false){
                $_SESSION['username'] = $player->getName();
                $this->show($player->getId());
            }    
        }else{
            $view = new View('player');
            $view->render('login.php'); 
        }              
    }

    public function logout()
    {
        unset($_SESSION['username']);
        session_destroy();
        $controller = new PageController ();
        $controller->index();
    }
}
