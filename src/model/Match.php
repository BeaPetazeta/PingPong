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

	/*En el constructor pedimos dos nombre*/
	function __construct( $playerOne, $playerTwo ){
       $this->playerOne = $playerOne;
       $this->playerTwo = $playerTwo;
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
}