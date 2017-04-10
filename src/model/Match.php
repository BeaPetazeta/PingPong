<?php
namespace LeanProgrammers\Model;

class Match{
	public $playerOne;//nombre del jugador 1 del partido
	public $playerTwo;
	/*Se declara la variable de tipo fecha donde se almacenará la fecha del partido*/
	public $dateMatch;
	/*Se declaran dos variables donde se almacenarán los puntos de cada jugador*/

	public $pointsPlayerOne;
	public $pointsPlayerTwo;

	private $pointsPlayer1;
	private $pointsPlayer2;
    private $round;


	/*En el constructor pedimos dos nombre*/
	function __construct( $player1, $player2 ){
       $this->player1 = $player1;
       $this->player2 = $player2;
    }

    /*Función setDate, para introducirle fecha a el partido*/
    public function setDate( $date )
    {

    	$this->dateMatch = $date;
    }
    public function getDate(){
        return $this->dateMatch;
    }

    /*Función que devuelve un array con la lista d elos nombres*/
    public function getPlayersName()
    {
    	$playersArray = array();
    	array_push( $playersArray, $this->playerOne );
    	array_push( $playersArray, $this->playerTwo );
    	return $playersArray;
    }

    /*Función match donde se recogen dos número que pertenecen a la puntuación del partido y devuelve el ganador, esto datos se refieren a la puntuación del primer jugador y segundo en es sorden respectivamente*/
    // public function setMatch( $pointsPlayerOne, $pointsPlayerTwo )
    // {

    // 	/*TODO */
    // 	Crear filtro por si introducen valores erroneos
    // 	if( $pointsPlayerOne > $pointsPlayerTwo ){
    // 		return $this->playerOne;
    // 	}else{
    // 		return $this->playerTwo;
    // 	}
    // }

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
        }else {
            return "empate";
        }
    }
    public function getResult(){
        return $this->pointsPlayer1 . " - " . $this->pointsPlayer2;
    }

    public function setRound($round){
        $this->round = $round;
    }

    public function getRound(){
        return $this->round;
    }


}