<?php
namespace LeanProgrammers\Model;

use LeanProgrammers\Repository\PlayerRepository;

class Player
{
    private $id = null;
    private $name = '';
    private $nick = '';


    public function __construct($name = '')
    {
        $this->name = $name;
    }

    public function __toString(){
    	return $this->name;
    }
    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setNick($nick){
        $this->nick=$nick;
    }
    public function getNick(){
        return $this->nick;
    }
    public function setMail($mail){
        $this->mail=$mail;
    }
    public function getMail(){
        return $this->mail;
    }
    public function inscribe($championship){
        PlayerRepository::inscribe($championship, $this);
        $championship->addPlayer($this);
        if ($championship->countPlayers()==8){
            $championship->createFirstRound();
        }
    }
}
