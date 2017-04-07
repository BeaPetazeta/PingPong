<?php
namespace LeanProgrammers\Model;

class Player
{
    private $name = '';

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
}
