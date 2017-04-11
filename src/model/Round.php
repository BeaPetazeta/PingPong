<?php
namespace LeanProgrammers\Model;

use LeanProgrammers\Model\Match;
use LeanProgrammers\Model\Championship;
use LeanProgrammers\Repository\RoundRepository;

class Round
{
    private $id = null;
    private $matches = array();//Array de partidos
    private $championship;

    public function __construct($championship){
        $this->championship = $championship;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getMatches(){
        return $this->matches;
    }

    public function addMatch($match){
        $this->matches[] = $match;
    }
    public function checkPointsMatches(){
    	foreach ($matches as $match) {
    		if ($match->getPointsPlayer1()!=null || $match->getPointsPlayer2()!=null){
    			return true;
    		}else{
    			return false;
    		}
    	}
    }
    public function setChampionship($championship){
        $this->championship = $championship;
    }
    public function getChampionship(){
        return $this->championship;
    }
    public function save(){
        if(null != $this->getId()){
            RoundRepository::update($this);
        }else{
            return RoundRepository::create($this);
        }
    }
}

?>