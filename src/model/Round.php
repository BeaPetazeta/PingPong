<?php
namespace LeanProgrammers\Model;

use LeanProgrammers\Model\Match;
use LeanProgrammers\Model\Championship;

class Round
{
    private $matches = array();//Array de partidos

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
}

?>