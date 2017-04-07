<?php
namespace LeanProgrammers\Model;

use LeanProgrammers\Model\Player;
use LeanProgrammers\Model\Round;

class Championship{

    /*Variables*/
    private $name; //Nombre del campeonato

    public $players = array(); //Lista de nombres de los jugadores
    public $points = array(); //Array de puntos
    public $gameWinners = array(); //Array donde almacenaremos los ganadores de los partidos
    public $rounds = array(); //Array de rondas
    


	//Cuando creamos un objeto de esta clase, el constructor espera una variable necesaria que es name. Podemos crear un torneo sin haber dado una lista de jugadores antes, por eso pasamos array vacio
    function __construct( $name, $players=[], $pointsList=null ){
        /*Se asignan los valores de la lista que hemos recibido en las variables de la clase*/
        $this->name = $name;
        $this->points = $pointsList;

        for ($i=0; $i < count($this->players) ; $i++) {
        	$players[$i] = new Player($players[$i]);
        }
    }

    function setPlayers( $players )
    {
      $this->players = $players;
    }

    //creamos el nombre del campeonato
    function setName( $name )
    {
    	$this->name = $name;
    }

    //recuperamos el nombre del campeonato almacenado
    function getName()
    {
    	return $this->name;
    }

    function getPlayers(){
        return $this->players;
    }

    public function addPlayer($name){
        $player = new Player($name);
        $this->players[] = $player;
    }
    //Creo la primera ronda cogiendo la lista completa de los jugadores y uniéndolos de dos en dos
    function createFirstRound(){
        $round = new Round();
        //voy mirando la lista de jugadores para unirlos de dos en dos para crear un partido
        for($i=0; $i<count($this->players); $i+=2){
            $round->addMatch(new Match ($this->players[$i],$this->players[$i+1])); //añade los partidos            
        }

        $this->rounds[] = $round;
        return $round;
    }
    //Esta función muestra las rondas
    function getRounds(){
       return $this->rounds;
    }

    function setPointsMatch($match, $pointsPlayer1, $pointsPlayer2){
        $match->setPointsPlayer1($pointsPlayer1);
        $match->setPointsPlayer2($pointsPlayer2);
        $this->gameWinners[]=$match->getWinner();
        
        $round = new Round();

        if ($round->nextRound()){
            $this->nextRound($this->gameWinners);
        }
        echo "HOLA".$this->gameWinners;
        return $this->gameWinners;
    }

    function nextRound($gameWinners){
        $round = new Round();
        //crear partidos con los ganadores de la primera ronda
        for ($i=0; $i < count($gameWinners); $i+2) { 
            $match = new Match($gameWinners[i], $gameWinners[i+1]);
            $round->addMatch($match);
        return $round;
    }
}

//Crear una lista de partidos (round) con los ganadores de la primera ronda