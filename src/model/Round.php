<?php
namespace LeanProgrammers\Model;

use LeanProgrammers\Model\Match;
class Round
{
    private $matches = array();//Array de partidos

    public function getMatches(){
        return $this->matches;
    }

    public function addMatch($match){
        $this->matches[] = $match;
    }
}

?>