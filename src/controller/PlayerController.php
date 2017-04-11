<?php
namespace LeanProgrammers\Controller;

use LeanProgrammers\Framework\View;
use LeanProgrammers\Repository\PlayerRepository;
use LeanProgrammers\Repository\MatchRepository;
use LeanProgrammers\Controller\PageController;

class PlayerController
{
    public function index(){
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

    public function login(){
        if(isset($_POST['login'])){
            $player = PlayerRepository::existYet($_POST['email'], $_POST['password']);
            if($player != false){
                $_SESSION['username'] = $player->getName();
                $_SESSION['userId'] = $player->getId();
                $this->show($player->getId());
            }
        }else if(isset($_POST['register'])){
            $this->register();
        }else{
            $view = new View('player');
            $view->render('login.php');
        }
    }

    public function logout(){
        unset($_SESSION['username']);
        session_destroy();
        $controller = new PageController ();
        $controller->index();
    }

    private function register(){
        if ($_POST['password'] == $_POST['repassword']){
            $controller = new PlayerRepository();
            $player = $controller->register($_POST['username'], $_POST['username'], $_POST['email'], $_POST['password']);
            $_SESSION['username'] = $player->getName();
            $_SESSION['userId'] = $player->getId();
            $this->show($player->getId());
        }else{
            return false;
        }
    }
}
