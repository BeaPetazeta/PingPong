<?php
namespace LeanProgrammers\Model;

class Match{
	private $player1;//nombre del jugador 1 del partido
	private $player2;
	/*Se declara la variable de tipo fecha donde se almacenará la fecha del partido*/
	public $dateMatch;
	/*Se declaran dos variables donde se almacenarán los puntos de cada jugador*/
	private $pointsPlayer1;
	private $pointsPlayer2;

	/*En el constructor pedimos dos nombre*/
	function __construct( $player1, $player2 ){
       $this->player1 = $player1;
       $this->player2 = $player2;
    }

    function __toString(){
        return $this->player1->getName()." - ". $this->player2->getName();
    }

    /*Función setDate, para introducirle fecha a el partido*/
    public function setDate( $date )
    {
    	$this->dateMatch = $date;
    }

    /*Función que devuelve un array con la lista d elos nombres*/
    public function getPlayersName()
    {
    	$playersArray = array();
    	array_push( $playersArray, $this->player1 );
    	array_push( $playersArray, $this->player2 );
    	return $playersArray;
    }
    //seteamos y pasamos tanto los jugadores como los puntos
    public function setPlayer1($player1){
        $this->player1 = $player1;
    }
    public function getPlayer1(){
        return $this->player1;
    }

    public function setPlayer2($player2){
        $this->player2 = $player2;
    }
    public function getPlayer2(){
        return $this->player2;
    }
    public function setPointsPlayer1($pointsPlayer1){
        $this->pointsPlayer1 = $pointsPlayer1;
    }
    public function getPointsPlayer1(){
        return $this->pointsPlayer1;
    }
    public function setPointsPlayer2($pointsPlayer2){
        $this->pointsPlayer2 = $pointsPlayer2;
    }
    public function getPointsPlayer2(){
        return $this->pointsPlayer2;
    }
    /*Se recogen dos número que pertenecen a la puntuación del partido y devuelve el ganador, esto datos se refieren a la puntuación del primer jugador y segundo en es sorden respectivamente*/
    public function getWinner(){
        if($this->pointsPlayer1 > $this->pointsPlayer2){
            return $this->player1;
        }elseif($this->pointsPlayer1 < $this->pointsPlayer2){
            return $this->player2;
        }
    }







}