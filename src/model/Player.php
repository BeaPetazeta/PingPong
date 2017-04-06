<?php
namespace LeanProgrammers\Model;

class Player
{
    private $name = '';
    private $nick;
    private $id;
    private $email;

    public function __construct($name = '')
    {
        $this->name = $name;
    }

    public function __toString(){
    	return $this->name;
    }
    public function getName(){
        return $this->name;
    }
    //Seteamos los parametros ID, EMAIL y NICK, para pasarselos posteriormente a la clase player.
    public function setId($id){
        $this->id = $id;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setNick($nick){
        $this->nick = $nick;
    }
}
